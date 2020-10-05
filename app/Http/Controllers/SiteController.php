<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Repositories\CategorieRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $produitRepository;
    protected $categorieRepository;

    protected $nbrPerPage = 4;

	public function __construct(ProduitRepository $produitRepository,
								CategorieRepository $categorieRepository)
	{
		$this->produitRepository = $produitRepository;
		$this->categorieRepository = $categorieRepository;
	}

    public function allproduit(){
        $categories=Categorie::all();
        $produitsParCategorie = [];
        $categoriesType = [];
        $categoriesId = [];
        foreach ($categories as $categorie) {
            $produits=DB::select('select designation,prix,image,id from produits Where produits.categorie_id =? limit 0,4',[$categorie->id]);
            $produitsParCategorie[$categorie->type] = $produits;
            $categoriesType[] = $categorie->type;
            $categoriesId[] = $categorie->id;
        }
        
        return view('sites.contenusite.allproduit',compact('produitsParCategorie', 'categoriesType','categoriesId'));
    }
    
    public function allProduitParCategorie($categorieId){
        $produitparcategorie = DB::select('select * from produits Where produits.categorie_id = ?', [$categorieId]);
        $categorie = $this->categorieRepository->getById($categorieId);
        return view('sites.listeproduit.produitparcategorie',compact('produitparcategorie', 'categorie'));
    }
   
    public function getcategorie(){
        $categories=Categorie::all();
        return view('sites.mastersite',compact('categories'));
    }
    public function siteindex()
	{
        $categories=Categorie::all();
        $produits = DB::select('select * from produits');
		return view('sites.index', compact('produits','categories'));
    }
    public function produitdetail($id)
	{
		$produit = $this->produitRepository->getById($id);
		return view('sites.contenusite.detailproduit',compact('produit'));
	}































   /* private function returnArticle($status, $orderby, $order, Request $request)
    {
        if ($request->get('categorie_id')) {
            $this->produit = Categorie::find($request->get('categorie_id'))->articles_paginated;

            $categorie = Categorie::findOrFail($_GET['categorie']);
            $id = $categorie->articles;
            $prod = '';
            foreach ($id as $idprod) {
                $prod .= Produit::where('status', '=', $status)
                                            ->where('id', '=', $idprod)
                                            ->orderBy($orderby, $order)
                                            ->paginate(10);
            }
            $this->produit = $prod;
        } else {
            $this->produit = Produit::where('status', '=', $status)
                                        ->orderBy($orderby, $order)
                                        ->paginate(10);
        }
        return view('sites/listeproduit/voiture', ['produit' => $this->produit]);
    }*/

}

