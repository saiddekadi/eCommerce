<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'designation', 'quantite', 'prix', 'categorie_id', 'image', 'description',
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function commandes()
    {
        $this->belongsToMany('App\Models\Commande');
    }

    public function getprix(){
        $prix = $this->prix;
        return number_format($prix, 2, ',', ' ').'GNF';
    }

}
