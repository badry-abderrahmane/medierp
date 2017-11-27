<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
// use GetChargesBy;
// use GetAlimentationsBy;

class CombineBanque
{
    public function banque($instances)
    {
      $getChargesBy  = new GetChargesBy;
      $getAlimentationsBy  = new GetAlimentationsBy;
      $charges       = $getChargesBy->prepareQuery($instances);
      $alimentations = $getAlimentationsBy->prepareQuery($instances);
      $values = $this->combine($charges,$alimentations);

     return $values;
    }

    public function combine($charges, $alimentations)
    {
      $values = $charges->merge($alimentations);

    return $values;
    }


}
