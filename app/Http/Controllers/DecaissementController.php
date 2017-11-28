<?php

namespace App\Http\Controllers;

use App\Decaissement;
use Illuminate\Http\Request;
use App\Http\Requests\DecaissementRequest;
use Illuminate\Support\Facades\Response;

class DecaissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decaissements = Decaissement::all();
        $decaissements->filter->operation;
        $decaissements->filter->marche;
        return $decaissements->toJson();
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
    public function store(DecaissementRequest $request)
    {
        $decaissement = Decaissement::create($request->toArray());
        return Response::json(['message' => 'Decaissement bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decaissement = Decaissement::findOrfail($id);
        $decaissement->operation;
        $decaissement->marche;
        return Response::json($decaissement, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Decaissement $decaissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function update(DecaissementRequest $request, $id)
    {
        $decaissement = Decaissement::findOrfail($id);
        $decaissement->update($request->toArray());
        return Response::json(['message' => 'Decaissement bien mis à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Decaissement::destroy($id);
        return Response::json(['message' => 'Decaissement bien supprimé'], 200);
    }
}
