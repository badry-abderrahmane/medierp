<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
// use GetChargesBy;
// use GetAlimentationsBy;

class CombineCaisse
{
    public function caisse($instances)
    {
      $getChargesBy        = new GetChargesBy;
      $getAlimentationsBy  = new GetAlimentationsBy;
      $charges             = $getChargesBy->prepareQuery($instances);
      $alimentations       = $getAlimentationsBy->prepareQuery($instances);
      $values              = $this->combine($charges,$alimentations);
      $values              = $this->solde($instances,$values);

     return $values;
    }

    public function combine($charges, $alimentations)
    {
      $values = $charges->merge($alimentations);

    return $values;
    }

    public function solde($instances,$values)
  	{
      $getChargesBy        = new GetChargesBy;
      $getAlimentationsBy  = new GetAlimentationsBy;
      foreach ($values as $key => $value) {
        $xcharges      = $getChargesBy->historySumMontant($instances,$value->date);
        $xalims        = $getAlimentationsBy->historySumMontant($instances,$value->date);
        if (property_exists($value,"typecharge_id")) {
          $solde  = $xalims-$xcharges-$value->montant;
          $value->solde  = number_format($solde, 2, '.', ',');
        }else{
          $solde  = $xalims-$xcharges+$value->montant;
          $value->solde  = number_format($solde, 2, '.', ',');
        }

          $value->montant  = number_format($value->montant, 2, '.', ',');
      }

    return $values;
  	}

}
