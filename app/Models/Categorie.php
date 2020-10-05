<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'type',
    ];

    public function produits(){
        return $this->hasMany('App\Models\Produit');
    }

}
