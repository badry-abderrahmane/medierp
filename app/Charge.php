<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
      'designation', 'date','montant','typecharge_id','marche_id','responsable_id','societe_id',
    ];

    public function societe(){
        return $this->belongsTo('App\Societe');
    }

    public function marche(){
        return $this->belongsTo('App\Marche');
    }

    public function typecharge(){
        return $this->belongsTo('App\Typecharge');
    }

    public function responsable(){
        return $this->belongsTo('App\Responsable');
    }
}
