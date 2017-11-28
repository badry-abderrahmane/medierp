<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
// use GetChargesBy;
// use GetAlimentationsBy;

class CombineBanque
{
    public function banque($instances,$societe_id)
    {
      $getDecaissementsBy  = new GetDecaissementsBy;
      $getEncaissementsBy  = new GetEncaissementsBy;
      $decaissements       = $getDecaissementsBy->prepareQuery($instances);
      $encaissements       = $getEncaissementsBy->prepareQuery($instances);
      $values              = $this->combine($decaissements,$encaissements);
      $values              = $this->solde($instances,$societe_id,$values);
     return $values;
    }

    public function combine($decaissements,$encaissements)
    {
      $values = $decaissements->merge($encaissements);

    return $values;
    }

    public function solde($instances,$societe_id,$values)
  	{
      $societe = \App\Societe::findOrFail($societe_id);
      $getDecaissementsBy  = new GetDecaissementsBy;
      $getEncaissementsBy  = new GetEncaissementsBy;
      foreach ($values as $key => $value) {
        $xencaissements      = $getEncaissementsBy->historySumMontant($instances,$value->date);
        $xdecaissements      = $getDecaissementsBy->historySumMontant($instances,$value->date);
        if (property_exists($value,"operation_id")) {
          $solde  = $societe->solde+$xencaissements-$xdecaissements-$value->montant;
          $value->solde  = number_format($solde, 2, '.', ',');
        }else{
          $solde  = $societe->solde+$xencaissements-$xdecaissements+$value->montant;
          $value->solde  = number_format($solde, 2, '.', ',');
        }

          $value->montant  = number_format($value->montant, 2, '.', ',');
      }

    return $values;
  	}

}
