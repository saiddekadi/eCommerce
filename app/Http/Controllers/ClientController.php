<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\Clients\CreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientRepository;

	protected $nbrPerPage = 4;
	
	public $count = 0;

    public function __construct(ClientRepository $clientRepository)
	{
		$this->clientRepository = $clientRepository;
	}

	public function index()
	{
		$clients = $this->clientRepository->getPaginate($this->nbrPerPage);
		$links = $clients->render();
		$data = $this->clientRepository->data();
		return view('clients.index', $data, compact('clients', 'links'));
	}

	public function create()
	{
		$data = $this->clientRepository->data();
		return view('clients.create', $data);
	}

	public function store(ClientCreateRequest $request)
	{
		$client = $this->clientRepository->store($request->all());
		$this->count++;
		return redirect('client')->withOk("Le client " . $client->nom . " a été créé.");
	}

	public function show($id)
	{
		$client = $this->clientRepository->getById($id);
		$data = $this->clientRepository->data();
		return view('clients.show', $data,  compact('client'));
	}

	public function edit($id)
	{
		$client = $this->clientRepository->getById($id);
		$data = $this->clientRepository->data();
		return view('clients.edit', $data,  compact('client'));
	}

	public function update(ClientUpdateRequest $request, $id)
	{

		$this->clientRepository->update($id, $request->all());
		return redirect('client')->withOk("Le client " . $request->input('nom') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->clientRepository->destroy($id);
		$this->count--;
		return redirect()->back();
	}

}
