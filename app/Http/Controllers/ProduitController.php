<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitCreateRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    protected $produitRepository;
    protected $categorieRepository;

	protected $nbrPerPage =4 ;
	public $count = 0;

	public function __construct(ProduitRepository $produitRepository, 
								CategorieRepository $categorieRepository,		
								CategorieController $categorieController)		
	{
		$this->produitRepository = $produitRepository;
		$this->categorieRepository = $categorieRepository;
		$this->categorieController = $categorieController;
	}

	public function index()
	{
		$produits = $this->produitRepository->getPaginate($this->nbrPerPage);
		$links = $produits->render();
		$data = $this->produitRepository->data();
		return view('produits.index', $data, compact('produits', 'links'));
	}

	public function create()
	{
		$categories = $this->categorieRepository->getPaginate($this->categorieController->count);
		$data = $this->produitRepository->data();
		return view('produits.create', $data,  compact('categories'));
	}

	public function store(ProduitCreateRequest $request)
	{

		$request->image->store(config('images.path'), 'public');
		$imageName = $request->image->hashName();
		$inputs = array_merge($request->all(), ['image' => $imageName]);
		$produit = $this->produitRepository->store($inputs);
		$this->count++;
		return redirect('produit')->withOk("Le produit " . $produit->designation . " a été créé.");

	}

	public function show($id)
	{
		$produit = $this->produitRepository->getById($id);
		$data = $this->produitRepository->data();
		return view('produits.show', $data,  compact('produit'));
	}

	public function edit($id)
	{
		$produit = $this->produitRepository->getById($id);
		$categories = $this->categorieRepository->getPaginate($this->categorieController->count);
		$data = $this->produitRepository->data();
		return view('produits.edit', $data,  compact('produit', 'categories'));
	}

	public function update(ProduitUpdateRequest $request, $id)
	{

		$imageName = '';
		if($request->image != null)
		{
			$request->image->store(config('images.path'), 'public');
			$imageName = $request->image->hashName();
		}else{
			$produit = $this->produitRepository->getById($id);
			$imageName = $produit->image;
		}
		
		$inputs = array_merge($request->all(), ['image' => $imageName]);
		$this->produitRepository->update($id, $inputs);

		
		return redirect('produit')->withOk("Le produit" . $request->input('designation') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->produitRepository->destroy($id);
		$this->count--;
		return redirect()->back();
	}

	

}
