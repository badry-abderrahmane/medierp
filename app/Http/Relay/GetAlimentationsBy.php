<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GetAlimentationsBy
{
    public function prepareQuery($instances){
      $query = DB::table('alimentations');
      foreach ($instances as $key => $instance) {
        if ($instance['value'] && $instance['name'] != 'typecharge_id') {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }else{
            $query->whereMonth($instance["name"], $instance["value"]);
          }
        }
      }
      $alimentations = $query->get();
      $alimentations = $this->responsable($alimentations);

    return $alimentations;
    }

    public function historySumMontant($instances,$date){
      $query = DB::table('alimentations');

      foreach ($instances as $key => $instance) {
        if ($instance['value'] && $instance['name'] != 'typecharge_id') {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }
        }
      }

      $startDate = new Carbon('first day of January');
      $date      = new Carbon($date);

      $date->endOfDay()->subDay();
      $query->whereBetween('date',array($startDate->toDateString(), $date));

      $sumAlimentations = $query->sum('montant');

    return $sumAlimentations;
    }

    public function responsable($alimentations){
      foreach ($alimentations as $key => $value) {
        $value->responsable = \App\Responsable::findOrFail($value->responsable_id)->first();
      }
    return $alimentations;
    }
}
