<?php

namespace App\Http\Relay;

class LogicRelay
{
    public function test($var){
      $var = \App\Charge::all();
      return $var;
    }
}
