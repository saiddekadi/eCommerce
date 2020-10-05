<?php

namespace App\Repositories;

use App\Models\Commande_produit;
use App\Models\Concerner;
use App\Models\Produit;

class Commande_produitRepository extends ResourceRepository
{

    public function __construct(Commande_produit $commande_produit)
	{
		$this->model = $commande_produit;
	}

}