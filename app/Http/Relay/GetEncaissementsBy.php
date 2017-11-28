<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GetEncaissementsBy
{
    public function prepareQuery($intances){
      $query = DB::table('encaissements');
      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            if ($instance['name'] != 'societe_id') {
              $query->where($instance["name"], $instance["value"]);
            }else{
              $query->whereIn('marche_id', $instance["value"]);
            }
          }else{
            $query->whereMonth($instance["name"], $instance["value"]);
          }
        }
      }
      $encaissements = $query->get();
      $encaissements = $this->marche($encaissements);

    return $encaissements;
    }

    public function historySumMontant($instances,$date){
      $query = DB::table('encaissements');

      foreach ($instances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            if ($instance['name'] != 'societe_id') {
              $query->where($instance["name"], $instance["value"]);
            }else{
              $query->whereIn('marche_id', $instance["value"]);
            }
          }
        }
      }

      $startDate = new Carbon('first day of January');
      $date      = new Carbon($date);

      $date->endOfDay()->subDay();
      $query->whereBetween('date',array($startDate->toDateString(), $date));

      $sumEncaissements = $query->sum('montant');

    return $sumEncaissements;
    }

    public function marche($encaissements){
      foreach ($encaissements as $key => $value) {
        $value->marche = \App\Marche::findOrFail($value->marche_id);
      }
    return $encaissements;
    }
}
