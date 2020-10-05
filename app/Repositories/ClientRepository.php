<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository extends ResourceRepository
{

    public function __construct(Client $client)
	{
		$this->model = $client;
	}

}