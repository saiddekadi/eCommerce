<?php

namespace App\Http\Controllers;

use App\Http\Requests\Commande_produitRequest;
use App\Http\Requests\ConcernerRequest;
use App\Repositories\Commande_produitRepository;
use App\Repositories\CommandeRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Support\Facades\DB;

class Commande_produitController extends Controller
{

    protected $commande_produitRepository;
    protected $commandeRepository;
    protected $produitRepository;
    protected $produitController;
    protected $nbrPerPage = 4;
	public $count = 0;

    public function __construct(Commande_produitRepository $commande_produitRepository,
                                    CommandeRepository $commandeRepository, 
                                    ProduitRepository $produitRepository,
                                    ProduitController $produitController)
	{
		$this->commande_produitRepository = $commande_produitRepository;
		$this->commandeRepository = $commandeRepository;
		$this->produitRepository = $produitRepository;
		$this->produitController = $produitController;
	}

	public function createProductInCommande($id){
		$commande = $this->commandeRepository->getById($id);
		$client_id = $commande->client_id;
		$produits = $this->produitRepository->getPaginate($this->produitController->count);
		$data = $this->commande_produitRepository->data();
		return view('commandes.produits', $data, compact('id', 'client_id', 'produits'));
	}

    
    public function store(Commande_produitRequest $request)
	{
		$message = '';
		$produit = $this->produitRepository->getById($request->input('produit_id'));
		if($request->input('quantite') <= $produit->quantite)
		{
			$produitCmd = DB::select('select * from commande_produit where produit_id = ? && commande_id = ?', 
										[$produit->id, $request->input('commande_id')]);
			if($produitCmd != null)
			{
				$message = "Vous avez deja commande ce produit";
			}else
			{
				$this->commande_produitRepository->store($request->all());
				$this->achatProduit($produit->id, $request->input('quantite'));
				$message = "La produit ".$produit->designation." a été .";
			}
			
		}else
		{
			$message = "Désolé, il n'y a que ".$produit->quantite." ".$produit->designation." disponible";
		}
		return redirect('commande')->withOk($message);
	}

	public function edit($commande_id, $produit_id)
	{
		$produit = $this->produitRepository->getById($produit_id);
		$produitCmd = DB::select('select * from commande_produit where produit_id = ? && commande_id = ?', 
										[$produit->id, $commande_id])[0];
		$data = $this->commande_produitRepository->data();
		return view('commandes.showproduitcmd', $data,  compact('produit', 'produitCmd'));

	}

    public function update(Commande_produitRequest $request, $commande_id, $produit_id)
	{
		//dd('hello');
		$produit = $this->produitRepository->getById($produit_id);
		$quantite = $request->input('quantite');
		$message = '';
		if($produit->quatite <= $quantite)
		{
			$produitCmd = DB::select('select * from commande_produit where produit_id = ? && commande_id = ?', 
										[$produit->id, $commande_id])[0];
			DB::update('update commande_produit set quantite = ? where commande_id = ? && produit_id = ?', 
						[$quantite, $commande_id, $produit_id]);
			$this->retourProduit($produit->id, $produitCmd->quantite);
			$this->achatProduit($produit->id, $quantite);
			$message = "Le produit" . $produit->designation . " a été modifié.";
		}else
		{
			$message = "Désolé, il n'y a que ".$produit->quantite." ".$produit->designation." disponible";
		}


		return redirect('commande')->withOk($message);
	}

	
	public function achatProduit($produit_id, $cmd)
	{
		$produit = $this->produitRepository->getById($produit_id);
		$this->produitRepository->update($produit_id, [
			'designation' => $produit->designation,
			'prix' => $produit->prix,
			'categorie_id' => $produit->categorie_id,
			'image' => $produit->image,
			'quantite' => $produit->quantite - $cmd,
		]);

	}
	public function retourProduit($produit_id, $cmd)
	{
		$produit = $this->produitRepository->getById($produit_id);
		$this->produitRepository->update($produit_id, [
			'designation' => $produit->designation,
			'prix' => $produit->prix,
			'categorie_id' => $produit->categorie_id,
			'image' => $produit->image,
			'quantite' => $produit->quantite + $cmd,
		]);

	}
   
    public function destroy($commande_id, $produit_id)
	{
		$produitCmd = DB::select('select * from commande_produit where produit_id = ? && commande_id = ?', 
										[$produit_id, $commande_id])[0];
		DB::delete('DELETE FROM commande_produit WHERE commande_id = ? && produit_id = ?', [$commande_id, $produit_id]);
		$this->count--;
		$this->retourProduit($produit_id, $produitCmd->quantite);
		return redirect()->back();
	}
}

