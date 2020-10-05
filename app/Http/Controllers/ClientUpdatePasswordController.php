<?php

namespace App\Http\Controllers;

use App\Http\Requests\passwordCreateRequest;
use App\Http\Requests\passwordUpdateRequest;
use App\Repositories\ClientRepository;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ClientUpdatePasswordController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getFormPassword($id)
    {
        $data = $this->clientRepository->data();
        return view('clients.changePassword', $data, compact('id'));
    }
    
    public function formChangePassword(passwordCreateRequest $request, $id)
    {
        $client = $this->clientRepository->getById($id);
        try {
            $password = Crypt::decrypt($client->password);
        } catch (DecryptException $e) {
            //
        }
        if($password == $request->input('password'))
        {
            return redirect()->route('client.editPassword', $id);
        }else
        {
            return redirect()->route('client.getFormPassword', $id)->withOk("Le mod de pass est incorect");

        }

    }

    public function editPassword($id)
    {
        $client  = $this->clientRepository->getById($id);
        $data = $this->clientRepository->data();
        return view('clients.editPassword', $data, compact('client'));

    }

   /* public function updatePassword(passwordUpdateRequest $request, $id)
    {
        $newPassword = Crypt::encrypt($request->input('password'));
        $user = DB::update('update users set password = ? where id = ?', [$newPassword, $id]);
        return redirect('admin')->withOk("Votre mot de pass a été modifié.");

    }*/
}
