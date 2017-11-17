<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;

class GetEncaissementsBy
{
    public function prepareQuery($intances){
      $query = DB::table('encaissements');
      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }else{
            $query->whereMonth($instance["name"], $instance["value"]);
          }
        }
      }
      $encaissements = $query->get();
      $encaissements = $this->marche($encaissements);

    return $encaissements;
    }

    public function marche($encaissements){
      foreach ($encaissements as $key => $value) {
        $value->marche = \App\Marche::findOrFail($value->marche_id)->first();
      }
    return $encaissements;
    }
}
