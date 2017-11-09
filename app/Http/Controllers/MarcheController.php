<?php

namespace App\Http\Controllers;

use App\Marche;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function show(Marche $marche)
    {
        //
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
    public function update(Request $request, Marche $marche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marche  $marche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marche $marche)
    {
        //
    }
}
