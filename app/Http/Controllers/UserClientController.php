<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateRequest;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
	{
		$this->clientRepository = $clientRepository;
	}

	public function edit()
	{
		return view('clients.addClient');
	}

    public function store(ClientCreateRequest $request)
	{
        $client = $this->clientRepository->store($request->all());
		return redirect()->route('signinForm')->withOk("Enregistrement effectuee, Vous pouvez vous connectez maintenant");
	}
}
