<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
      'name',
    ];

    public function decaissements(){
        return $this->hasMany('App\Decaissement');
    }

}
