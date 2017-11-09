<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decaissement extends Model
{
    protected $fillable = [
        'designation','date','code','montant','marche_id','operation_id',
    ];

    public function marche(){
        return $this->belongsTo('App\Marche');
    }

    public function operation(){
        return $this->belongsTo('App\Operation');
    }
}
