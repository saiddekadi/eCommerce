<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande_produit extends Model
{
    protected $fillable = [
        'produit_id', 'commande_id', 'quantite',
    ];

    protected $table = 'commande_produit';
}
