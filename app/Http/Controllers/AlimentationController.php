<?php

namespace App\Http\Controllers;

use App\Alimentation;
use Illuminate\Http\Request;

class AlimentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alimentations = Alimentation::all();
      return $alimentations->toJson();
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
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function show(Alimentation $alimentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimentation $alimentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentation $alimentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimentation $alimentation)
    {
        //
    }
}
