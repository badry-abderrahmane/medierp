<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model
{
    protected $fillable = [
        'designation','date','montant','responsable_id'
    ];

    public function responsable(){
        return $this->belongsTo('App\Responsable');
    }
}
