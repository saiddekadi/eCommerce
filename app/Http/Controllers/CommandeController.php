<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Repositories\ClientRepository;
use App\Repositories\Commande_produitRepository;
use App\Repositories\CommandeRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
	protected $commandeRepository;
	protected $clientRepository;
	protected $clientController;
	protected $produitRepository;
	protected $produitController;
	protected $commande_produitRepository;
	protected $commande_produitController;

    protected $nbrPerPage = 4;

	public function __construct(CommandeRepository $commandeRepository, 
									ClientRepository $clientRepository,
									ClientController $clientController,
									ProduitRepository $produitRepository,
									ProduitController $produitController,
									Commande_produitRepository $commande_produitRepository,
									Commande_produitController $commande_produitController)
	{
		$this->commandeRepository = $commandeRepository;
		$this->clientRepository = $clientRepository;
		$this->clientController= $clientController;
		$this->produitRepository= $produitRepository;
		$this->produitController= $produitController;
		$this->commande_produitRepository= $commande_produitRepository;
		$this->commande_produitController= $commande_produitController;
	}

	public function index()
	{
		$commandes = $this->commandeRepository->getPaginate($this->nbrPerPage);
		$links = $commandes->render();
		$data = $this->commandeRepository->data();
		return view('commandes.index', $data, compact('commandes', 'links'));
	}

	public function create()
	{
		$clients = $this->clientRepository->getPaginate($this->clientController->count);
		$produits = $this->produitRepository->getPaginate($this->produitController->count);
		$data = $this->commandeRepository->data();
		return view('commandes.create', $data, compact('clients', 'produits'));
	}

	public function store(CommandeRequest $request)
	{

		$client_id = $request->input('client_id');
		$commande = $this->commandeRepository->store(compact('client_id'));
		$commande_id = $commande->id;
		$produit_id = $request->input('produit_id');
		$quantite = $request->input('quantite');
		$produit_commande = $this->commande_produitRepository->store(compact('commande_id', 'produit_id', 'quantite'));
		$this->commande_produitController->achatProduit($produit_id, $quantite);
		return redirect('commande')->withOk("La commande " . $commande->id . " a été créé.")->with('produitCmd', $produit_commande);
	}

	public function show($id)
	{
		$commande = $this->commandeRepository->getById($id);
		$produitsCmd = DB::select('select * from commande_produit where commande_id = ?', [$id]);
		//dd($produitsCmd);
		$prods = [];
		$quantiteCmd = [];
		foreach ($produitsCmd as $produitCmd) {
			$produit = $this->produitRepository->getById($produitCmd->produit_id);
			$prods[] = $produit;
			$quantiteCmd[$produit->designation] = $produitCmd->quantite;
		}
		$data = $this->commandeRepository->data();
		return view('commandes.show', $data,  compact('commande', 'prods','quantiteCmd', 'produitsCmd'));
	}

	public function edit($id)
	{
		$commande = $this->commandeRepository->getById($id);
		$clients = $this->clientRepository->getPaginate($this->clientController->count);
		$produits = $this->produitRepository->getPaginate($this->produitController->count);
		$data = $this->commandeRepository->data();
		return view('commandes.edit', $data,  compact('commande', 'clients', 'produits'));
	}

	public function update(CommandeRequest $request, $id)
	{

		$this->commandeRepository->update($id, $request->all());
		
		return redirect('commande')->withOk("La Commande " . $request->input('id') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->commandeRepository->destroy($id);

		return redirect()->back();
	}
}
