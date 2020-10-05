<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieCreateRequest;
use App\Http\Requests\CategorieUpdateRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
     protected $categorieRepository;

	protected $nbrPerPage = 4;
	public $count = 0;

    public function __construct(CategorieRepository $categorieRepository)
	{
		$this->categorieRepository = $categorieRepository;
		
	}

	public function index()
	{
		$categories = $this->categorieRepository->getPaginate($this->nbrPerPage);
		$links = $categories->render();
		$data = $this->categorieRepository->data();
		return view('categories.index', $data, compact('categories', 'links'));
	}

	public function create()
	{
		$data = $this->categorieRepository->data();
		return view('categories.create', $data);
	}

	public function store(CategorieCreateRequest $request)
	{
		
		$categorie = $this->categorieRepository->store($request->all());
		$this->count++;
		return redirect('categorie')->withOk("La categorie " . $categorie->type . " a été créé.");
	}

	public function show($id)
	{
		$categorie = $this->categorieRepository->getById($id);
		$data = $this->categorieRepository->data();
		return view('categories.show', $data,  compact('categorie'));
	}

	public function edit($id)
	{
		$categorie = $this->categorieRepository->getById($id);
		$data = $this->categorieRepository->data();
		return view('categories.edit', $data,  compact('categorie', 'countClients', 'countCommandes', 'countProduits'));
	}

	public function update(CategorieUpdateRequest $request, $id)
	{

		$this->categorieRepository->update($id, $request->all());
		
		return redirect('categorie')->withOk("La categorie" . $request->input('type') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->categorieRepository->destroy($id);
		$this->count--;
		return redirect()->back();
	}

}
