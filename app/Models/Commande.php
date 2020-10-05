<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'client_id', 'created_at',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function produits()
    {
        return $this->belongsToMany('App\Models\Produit');
    }

    public function getDate($date)
    {
        $dateTime = new DateTime($date);
        $year = $dateTime->format('Y');
        $month = $dateTime->format('m');
        $day = $dateTime->format('d');
        $hour = $dateTime->format('H');
        $minute = $dateTime->format('i');

        return 'Le '. $day . '/'. $month . '/' . $year . ' à '. $hour . ':' . $minute;

    }
}
