<?php

namespace App\Http\Controllers;


if(!isset($_SESSION))
{
  session_start(); 
}

use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function affichePanier(){
        
        $count = Cart::content()->count();
        $produits = Cart::content();
        $total = Cart::subtotal();
        return view('sites.contenusite.detailpanier', compact('count', 'produits', 'total'));
    }

    public function ajoutPanier(Request $request){

        $duplicata= Cart::search(function ($cartItem, $rowId)use($request) {
            return $cartItem->id == $request->id;
        });

        if($duplicata->isNotEmpty()){
             return Redirect::back()->with('success','Le produit à deja été ajouté');
        }

        $produit=Produit::find($request->id);

        $data = [
            'id' => $produit->id,
            'name' => $produit->designation,
            'qty' => $request->input('quatity'),
            'price' => $produit->prix,
        ];

        Cart::add($data)->associate('App\Models\Produit');
        return Redirect::back()->with('success','Le produit à bien été ajouté');
    }

    public function update(Request $request){
        $i = 1;
        $nombreDeProduit = Cart::content()->count();
        $produits = Cart::content();
        foreach ($produits as $produit) {
            Cart::update($produit->rowId, $request->input('quantity'.$i));
            $i++;
        }
        return Redirect::back()->with('success','Le produit à bien été modifié');
    }

    public function supprimer($rowId){

    
         Cart::remove($rowId);
        return back()->with('success','Le produit a été retiré du panier.');
    }
}
