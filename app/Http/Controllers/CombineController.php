<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Relay\CombineCaisse;
use App\Http\Relay\CombineBanque;


class CombineController extends Controller
{


    public function getCaisse(CombineCaisse $combine, Request $request)
    {
        $instances = $this->orderRequest($request);
        $charges   = $combine->caisse($instances);

    return $charges;
    }

    public function getBanque(CombineBanque $combine, Request $request)
    {

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
