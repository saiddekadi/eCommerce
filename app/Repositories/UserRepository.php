<?php

namespace App\Repositories;

use App\Models\Client;
use App\User;

class UserRepository extends ResourceRepository
{

    public function __construct(User $user)
	{
		$this->model = $user;
	}

}