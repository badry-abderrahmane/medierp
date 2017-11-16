<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Relay\GetChargesBy;

class InventaireController extends Controller
{

  public function getCharges(GetChargesby $getChargesBy, Request $request){
    $instances = [];
    $i = 0;
    foreach ($request->request as $key => $value) {
      $instances[$i] = [];
      $instances[$i]['name'] = $key;
      $instances[$i]['value'] = $value;
      $i++;
    }
  //   $instances = array(
  //                   '0' => array('name' => 'date', 'value' => '10'),
  //                   '1' => array('name' => 'responsable_id', 'value' => '2'),
  //                   '2' => array('name' => 'societe_id', 'value' => '3'),
  //                   '3' => array('name' => 'marche_id', 'value' => '10'),
  //                   '4' => array('name' => 'typecharge_id', 'value' => '6'),
  //               );
    $charges = $getChargesBy->prepareQuery($instances);

    

  return $charges;
  }

}
