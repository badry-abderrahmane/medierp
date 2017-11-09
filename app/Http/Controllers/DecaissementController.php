<?php

namespace App\Http\Controllers;

use App\Decaissement;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function show(Decaissement $decaissement)
    {
        //
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
    public function update(Request $request, Decaissement $decaissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Decaissement  $decaissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decaissement $decaissement)
    {
        //
    }
}
