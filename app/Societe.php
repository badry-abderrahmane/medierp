<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $fillable = [
      'name', 'solde'
    ];

    public function charges(){
        return $this->hasMany('App\Charge');
    }

    public function marches(){
        return $this->hasMany('App\Marche');
    }

}
