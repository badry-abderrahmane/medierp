<?php

namespace App\Http\Controllers;

use App\Typecharge;
use Illuminate\Http\Request;

class TypechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typecharges = Typecharge::all();
        return $typecharges->toJson();
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
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function show(Typecharge $typecharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function edit(Typecharge $typecharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typecharge $typecharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typecharge $typecharge)
    {
        //
    }
}
