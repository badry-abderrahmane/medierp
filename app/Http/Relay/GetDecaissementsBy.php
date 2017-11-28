<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GetDecaissementsBy
{
    public function prepareQuery($intances){
      $query = DB::table('decaissements');
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
      $decaissements = $query->get();
      $decaissements = $this->marche($decaissements);
      $decaissements = $this->operation($decaissements);

    return $decaissements;
    }

    public function historySumMontant($instances,$date){
      $query = DB::table('decaissements');

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

      $sumDecaissements = $query->sum('montant');

    return $sumDecaissements;
    }

    public function operation($decaissements){
      foreach ($decaissements as $key => $value) {
        $value->societe = \App\Operation::findOrFail($value->operation_id);
      }
    return $decaissements;
    }

    public function marche($decaissements){
      foreach ($decaissements as $key => $value) {
        $value->marche = \App\Marche::findOrFail($value->marche_id);
      }
    return $decaissements;
    }
}
