<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

abstract class ResourceRepository
{

    protected $model;

    public function getPaginate($n)
	{
		return $this->model->paginate($n);
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->getById($id)->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function data()
	{
		$countClients = DB::table('clients')->count();
        $countCommandes = DB::table('commandes')->count();
		$countProduits = DB::table('produits')->count();

		$user = new User();
        $usr = DB::select('select * from users where id = ?', [1]);
		$user = $usr[0];

		return compact('countClients', 'countCommandes', 'countProduits', 'user');
	}

}