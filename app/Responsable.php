<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $fillable = [
      'name', 'note','lastName','phone','adresse','cin'
    ];

    public function charges(){
        return $this->hasMany('App\Charge');
    }

    public function alimentations(){
        return $this->hasMany('App\Alimentation');
    }

}
