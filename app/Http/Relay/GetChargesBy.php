<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GetChargesBy
{
    public function prepareQuery($intances){
      $query = DB::table('charges');

      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }else{
            $query->whereMonth($instance["name"], $instance["value"]);
          }
        }
      }
      $charges = $query->get();
      $charges = $this->responsable($charges);
      $charges = $this->societe($charges);
      $charges = $this->marche($charges);
      $charges = $this->typecharge($charges);

    return $charges;
    }

    public function historySumMontant($intances,$date){
      $query = DB::table('charges');

      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
          if ($instance['name'] != 'date') {
            $query->where($instance["name"], $instance["value"]);
          }
        }
      }

      $startDate = new Carbon('first day of January');
      $date      = new Carbon($date);

      $date->endOfDay()->subDay();
      $query->whereBetween('date',array($startDate->toDateString(), $date));

      $sumCharges = $query->sum('montant');

    return $sumCharges;
    }

    public function responsable($charges){
      foreach ($charges as $key => $value) {
        $value->responsable = \App\Responsable::findOrFail($value->responsable_id)->first();
      }
    return $charges;
    }

    public function societe($charges){
      foreach ($charges as $key => $value) {
        $value->societe = \App\Societe::findOrFail($value->societe_id)->first();
      }
    return $charges;
    }

    public function marche($charges){
      foreach ($charges as $key => $value) {
        $value->marche = \App\Marche::findOrFail($value->marche_id)->first();
      }
    return $charges;
    }

    public function typecharge($charges){
      foreach ($charges as $key => $value) {
        $value->typecharge = \App\Typecharge::findOrFail($value->typecharge_id)->first();
      }
    return $charges;
    }

}
