<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userRepository;

	

    public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create()
	{
		$data = $this->userRepository->data();
		return view('users.create', $data);
	}

	public function store()
	{
        $users = [
            'nom' => 'Camara',
            'prenom' => 'Mohamed Said',
            'email' => 'mohamedsaidc8@gmail.com',
            'password' => '00000000'
        ];
		/*$request->image->store(config('images.path'), 'public');
		$imageName = $request->image->hashName();
		$inputs = array_merge($request->all(), ['image' => $imageName]);*/
        $user = $this->userRepository->store($users);
        dd($user);
		//return redirect('user')->withOk("L'utilisateur " . $user->nom . " a été créé.");
	}

	public function show($id)
	{
		$user = $this->userRepository->getById($id);
		$data = $this->userRepository->data();
		return view('users.show', $data,  compact('user'));
	}

	public function edit()
	{
		
		$data = $this->userRepository->data();
        //dd($user);
		return view('users.edit', $data);
	}

	public function update(UserUpdateRequest $request, $id)
	{
		if($request->image != null)
		{
			$request->image->store(config('images.path'), 'public');
			$imageName = $request->image->hashName();
		}else{
			$client = $this->userRepository->getById($id);
			$imageName = $client->image;
		}

		$inputs = array_merge($request->all(), ['image' => $imageName]);
		$this->userRepository->update($id, $inputs);
		
		return redirect('admin')->withOk("L'utilisateur " . $request->input('nom') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->userRepository->destroy($id);
		return redirect()->back();
	}

}
