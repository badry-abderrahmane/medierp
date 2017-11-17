<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;

class GetEncaissementsBy
{
    public function prepareQuery($intances){
      $query = DB::table('decaissements');
      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }else{
            $query->whereMonth($instance["name"], $instance["value"]);
          }
        }
      }
      $decaissements = $query->get();
      $decaissements = $this->marche($decaissements);
      $decaissements = $this->operation($decaissements);

    return $decaissements;
    }

    public function operation($decaissements){
      foreach ($decaissements as $key => $value) {
        $value->societe = \App\Operation::findOrFail($value->operation_id)->first();
      }
    return $decaissements;
    }

    public function marche($decaissements){
      foreach ($decaissements as $key => $value) {
        $value->marche = \App\Marche::findOrFail($value->marche_id)->first();
      }
    return $decaissements;
    }
}
