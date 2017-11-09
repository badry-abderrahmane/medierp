<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    protected $fillable = [
      'dateDebut', 'delais','numero','montant','name','societe_id'
    ];

    public function societe(){
        return $this->belongsTo('App\Societe');
    }

    public function charges(){
        return $this->hasMany('App\Charge');
    }

    public function encaissements(){
        return $this->hasMany('App\Encaissement');
    }

    public function decaissements(){
        return $this->hasMany('App\Decaissement');
    }
}
