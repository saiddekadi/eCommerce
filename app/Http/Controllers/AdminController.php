<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
        $countClients = DB::table('clients')->count();
        $countCommandes = DB::table('commandes')->count();
        $countProduits = DB::table('produits')->count();

        $user = new User();
        $usr = DB::select('select * from users where id = ?', [1]);
		$user = $usr[0];

        $clientsRecents = DB::select('select * from clients where id > ?', [$countClients - 3]);

        return view('homeAdmin', compact('countClients', 'countCommandes', 'countProduits', 'user', 'clientsRecents'));
    }
}
