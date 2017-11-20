<?php

namespace App\Http\Controllers;

use App\Marche;
use Illuminate\Http\Request;
use App\Http\Requests\MarcheRequest;
use Illuminate\Support\Facades\Response;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marches = Marche::all();
        $marches->filter->societe;
        return $marches->toJson();
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
    public function store(MarcheRequest $request)
    {
        $marche = Marche::create($request->toArray());
        return Response::json(['message' => 'Marche bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marche = Marche::findOrfail($id);
        $marche->societe;
        return Response::json($marche, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function edit(Marche $marche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function update(MarcheRequest $request, $id)
    {
        $marche = Marche::findOrfail($id);
        $marche->update($request->toArray());
        return Response::json(['message' => 'Marche bien mis à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marche::destroy($id);
        return Response::json(['message' => 'Marche bien supprimé'], 200);
    }
}
