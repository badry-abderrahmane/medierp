<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typecharge extends Model
{
    protected $fillable = [
      'name'
    ];

    public function charges(){
        return $this->hasMany('App\Charge');
    }
    
}
