<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encaissement extends Model
{
    protected $fillable = [
        'designation','date','montant','description','marche_id',
    ];

    public function marche(){
        return $this->belongsTo('App\Marche');
    }
}
