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
** Inventaires Routes
**
**/
Route::group(['prefix' => 'inventaire'], function()
{
    Route::post('charges', 'InventaireController@getCharges');
    Route::post('alimentations', 'InventaireController@getAlimentations');
    Route::post('encaissements', 'InventaireController@getEncaissements');
    Route::post('decaissements', 'InventaireController@getDecaissements');
});

/**
** Combines Routes
**
**/
Route::group(['prefix' => 'combine'], function()
{
    Route::post('caisse', 'CombineController@getCaisse');
    Route::post('banque', 'CombineController@getBanque');
});


/**
** Get Lists
**
**/
Route::get('list/responsables', function(){
  $list = \App\Responsable::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/societes', function(){
  $list = \App\Societe::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/marches', function(){
  $list = \App\Marche::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/typecharges', function(){
  $list = \App\Typecharge::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/operations', function(){
  $list = \App\Operation::pluck('name','id')->toJson();
  return $list;
});
/**
** Get Totals
**
**/
Route::get('totale/decaissements', function(){
  $total = \App\Decaissement::count();
  return $total;
});
Route::get('totale/encaissements', function(){
  $total = \App\Encaissement::count();
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
  $total = \App\Charge::count();
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

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
