<?php

namespace App\Http\Controllers;

use App\Societe;
use Illuminate\Http\Request;
use App\Http\Requests\SocieteRequest;
use Illuminate\Support\Facades\Response;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societes = Societe::all();
        return $societes->toJson();
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
    public function store(SocieteRequest $request)
    {
        $societe = Societe::create($request->toArray());
        return Response::json(['message' => 'Société bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(Societe $societe)
    {
      $societe = Societe::findOrfail($societe)->first();
      return Response::json($societe, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(Societe $societe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(SocieteRequest $request, Societe $societe)
    {
      $societe = Societe::findOrfail($societe)->first();
      $societe->update($request->toArray());
      return Response::json(['message' => 'Société bien mise à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Societe::destroy($id);
      return Response::json(['message' => 'Société bien supprimée'], 200);
    }
}
