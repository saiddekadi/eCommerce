<?php

namespace App\Http\Controllers;

session_start();

use App\Http\Requests\ConnexionRequest;
use App\Http\Requests\passwordCreateRequest;
use App\Http\Requests\passwordUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getFormPassword()
    {
        $data = $this->userRepository->data();
        return view('connections.changePassword', $data);
    }
    
    public function formChangePassword(passwordCreateRequest $request)
    {
        $users  = DB::select('select * from users where id = ?', [1]);
        $user = $users[0];
        try {
            $password = Crypt::decrypt($user->password);
        } catch (DecryptException $e) {
            //
        }
        if($password == $request->input('password'))
        {
            return redirect('editPassword');
        }else
        {
            return redirect('getFormPassword')->withOk("Le mod de pass est incorect");

        }

    }

    public function editPassword()
    {
        $users  = DB::select('select * from users where id = ?', [1]);
        $user = $users[0];
        return view('connections.editPassword',compact('user'));

    }

    public function updatePassword(passwordUpdateRequest $request, $id)
    {
        $newPassword = Crypt::encrypt($request->input('password'));
        $user = DB::update('update users set password = ? where id = ?', [$newPassword, $id]);
        return redirect('admin')->withOk("Votre mot de pass a été modifié.");

    }

    public function formConnexion()
    {
        return view('clients.login');
    }

    public function connexion(ConnexionRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $pwd = Crypt::encrypt($password);
        $mail = Crypt::encrypt($email);
        $case = $request->input('remember');
        $clients = DB::select('select * from clients');
        foreach ($clients as $client) {
            try {
                $decrypted = Crypt::decrypt($client->password);
                $decrypted = Crypt::decrypt($client->password);
            } catch (DecryptException $e) {}

            $nom = Crypt::encrypt($client->nom);
            $prenom = Crypt::encrypt($client->prenom);
            $adresse = Crypt::encrypt($client->adresse);
            
            if($email  === $client->email && $password ===  $decrypted)
            {
                $telCrypt = Crypt::encrypt($client->tel);

                if(isset($case))
                {
                    setcookie('email', $mail, time()+365*24*3600, null, null, false, true);
                    setcookie('password', $pwd, time()+365*24*3600, null, null, false, true);
                    setcookie('tel',$telCrypt , time()+365*24*3600, null, null, false, true);
                    setcookie('nom',$nom , time()+365*24*3600, null, null, false, true);
                    setcookie('prenom',$prenom , time()+365*24*3600, null, null, false, true);
                    setcookie('adresse',$adresse , time()+365*24*3600, null, null, false, true);
                }else
                {
                    $_SESSION['email'] = $mail;
                    $_SESSION['password'] = $pwd;
                    $_SESSION['tel'] = $telCrypt;
                    $_SESSION['nom'] = $telCrypt;
                    $_SESSION['prenom'] = $telCrypt;
                    $_SESSION['adresse'] = $telCrypt;
                
                }

                return redirect('/panier')->with(['email' => $client->email, 'tel' => $client->tel]);
            }

        }

        return redirect()->route('signinForm')->withOk("Echec d'authentification, login ou mot de pass incorect");

    }


    public function disconected()
    {
        setcookie('email', '', time()-3600, null, null, false, true);
        setcookie('password', '', time()-3600, null, null, false, true);
        setcookie('tel', '', time()-3600, null, null, false, true);
        setcookie('nom', '', time()-3600, null, null, false, true);
        setcookie('prenom', '', time()-3600, null, null, false, true);
        setcookie('adresse', '', time()-3600, null, null, false, true);
        session_destroy();
        return redirect('/');

    }

    public function payement()
    {
        if(isset($_COOKIE['email']) && isset($_COOKIE['password']) && isset($_COOKIE['tel']) && isset($_COOKIE['nom']) && isset($_COOKIE['prenom']) && isset($_COOKIE['adresse']))
        {
            try {
                $nom = Crypt::decrypt($_COOKIE['nom']);
                $prenom = Crypt::decrypt($_COOKIE['prenom']);
                $adresse = Crypt::decrypt($_COOKIE['adresse']);
                $tel = Crypt::decrypt($_COOKIE['tel']);
            } catch (DecryptException $e) {
                
            }
            return view('sites.contenusite.payment', compact('nom', 'prenom', 'adresse','tel'));
            
        }elseif(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['tel']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['adresse']))
        {
            try {
                $nom = Crypt::decrypt($_SESSION['nom']);
                $prenom = Crypt::decrypt($_SESSION['prenom']);
                $adresse = Crypt::decrypt($_SESSION['adresse']);
                $tel = Crypt::decrypt($_SESSION['tel']);
            } catch (DecryptException $e) {
                
            }
            return view('sites.contenusite.payment', compact('nom', 'prenom', 'adresse', 'tel'));
        }else
        {
            return redirect()->route('signinForm')->withOk("Authentifier vous dabord");

        }
        
    }

}
