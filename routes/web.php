<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('test');
});

Route::resource('charges', 'ChargeController');
Route::resource('alimentations', 'AlimentationController');
Route::resource('encaissements', 'EncaissementController');
Route::resource('decaissements', 'DecaissementController');
Route::resource('operations', 'OperationController');
Route::resource('responsables', 'ResponsableController');
Route::resource('societes', 'SocieteController');
Route::resource('marches', 'MarcheController');
Route::resource('typecharges', 'TypechargeController');


/**
** Get Totals
**
**/
Route::get('totale/decaissements', function(){
  $total = \App\Decaissement::count();
  return $total;
});
Route::get('totale/encaissements', function(){
  $total = \App\Encaissements::count();
  return $total;
});
Route::get('totale/operations', function(){
  $total = \App\Operation::count();
  return $total;
});

Route::get('totale/alimentations', function(){
  $total = \App\Alimentation::count();
  return $total;
});
Route::get('totale/charges', function(){
  $total = \App\Charges::count();
  return $total;
});
Route::get('totale/typecharges', function(){
  $total = \App\Typecharge::count();
  return $total;
});

Route::get('totale/marches', function(){
  $total = \App\Marche::count();
  return $total;
});
Route::get('totale/responsables', function(){
  $total = \App\Responsable::count();
  return $total;
});
Route::get('totale/societes', function(){
  $total = \App\Societe::count();
  return $total;
});
