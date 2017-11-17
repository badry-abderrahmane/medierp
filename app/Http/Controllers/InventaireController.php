<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Relay\GetChargesBy;
use App\Http\Relay\GetAlimentationsBy;
use App\Http\Relay\GetEncaissementsBy;
use App\Http\Relay\GetDecaissementsBy;

class InventaireController extends Controller
{

  public function getCharges(GetChargesby $getChargesBy, Request $request){
    $instances = $this->orderRequest($request);
    $charges = $getChargesBy->prepareQuery($instances);
  return $charges;
  }

  public function getAlimentations(GetAlimentationsBy $getAlimentationsBy, Request $request){
    $instances = $this->orderRequest($request);
    $charges = $getAlimentationsBy->prepareQuery($instances);
  return $charges;
  }

  public function getEncaissements(GetEncaissementsBy $getEncaissementsBy, Request $request){
    $instances = $this->orderRequest($request);
    $charges = $getEncaissementsBy->prepareQuery($instances);
  return $charges;
  }

  public function getDecaissements(GetDecaissementsBy $getDecaissementsBy, Request $request){
    $instances = $this->orderRequest($request);
    $charges = $getDecaissementsBy->prepareQuery($instances);
  return $charges;
  }

  public function orderRequest($request){
    $instances = [];
    $i = 0;
    foreach ($request->request as $key => $value) {
      $instances[$i] = [];
      $instances[$i]['name'] = $key;
      $instances[$i]['value'] = $value;
      $i++;
    }
  return $instances;
  }
}
