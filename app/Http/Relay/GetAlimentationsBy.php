<?php

namespace App\Http\Relay;

use Illuminate\Support\Facades\DB;

class GetAlimentationsBy
{
    public function prepareQuery($intances){
      $query = DB::table('alimentations');
      foreach ($intances as $key => $instance) {
        if ($instance['value']) {
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

    public function responsable($alimentations){
      foreach ($alimentations as $key => $value) {
        $value->responsable = \App\Responsable::findOrFail($value->responsable_id)->first();
      }
    return $alimentations;
    }
}
