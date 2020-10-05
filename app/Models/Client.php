<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Client extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'tel', 'email', 'adresse', 'password',
    ];

    public function commandes(){
        return $this->hasMany('App\Models\Commande');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Crypt::encrypt($password);
    }
}
