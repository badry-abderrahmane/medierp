<?php

namespace App\Http\Controllers;

use App\Encaissement;
use Illuminate\Http\Request;
use App\Http\Requests\EncaissementRequest;
use Illuminate\Support\Facades\Response;

class EncaissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encaissements = Encaissement::all();
        $encaissements->filter->marche;
        return $encaissements->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EncaissementRequest $request)
    {
        $encaissement = Encaissement::create($request->toArray());
        return Response::json(['message' => 'Encaissement bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encaissement = Encaissement::findOrfail($id);
        $encaissement->marche;
        return Response::json($encaissement, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Encaissement $encaissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function update(EncaissementRequest $request, $id)
    {
        $encaissement = Encaissement::findOrfail($id);
        $encaissement->update($request->toArray());
        return Response::json(['message' => 'Encaissement bien mis à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Encaissement::destroy($id);
      return Response::json(['message' => 'Encaissement bien supprimé'], 200);
    }
}
