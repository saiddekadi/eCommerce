<?php

namespace App\Repositories;

use App\Models\Commande;

class CommandeRepository extends ResourceRepository
{

    public function __construct(Commande $commande)
	{
		$this->model = $commande;
	}

}