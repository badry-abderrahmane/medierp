<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Relay\CombineCaisse;
use App\Http\Relay\CombineBanque;


class CombineController extends Controller
{


    public function getCaisse(CombineCaisse $combineCaisse, Request $request)
    {
        $instances = $this->orderRequest($request);
        $charges   = $combineCaisse->caisse($instances);

    return $charges;
    }

    public function getBanque(CombineBanque $combineBanque, Request $request)
    {
        $societe_id = $request->societe_id;
        $instances  = $this->orderRequest($request);
        $instances  = $this->replaceSocieteWithMarches($instances);
        $charges    = $combineBanque->banque($instances,$societe_id);

    return $charges;
    }

    public function replaceSocieteWithMarches($instances)
    {
      foreach ($instances as $key => $value) {
        if ($value["name"] == 'societe_id') {
          $societe = \App\Societe::findOrFail($value["value"]);
          $societe->all();
          $marches = $societe->marches->pluck('id')->toArray();
          if ($marches != []) {
            $instances[$key]["value"] = $marches;
          }else{
            $instances[$key]["value"] = ['NULL'];
          }
        }
      }

    return $instances;
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
