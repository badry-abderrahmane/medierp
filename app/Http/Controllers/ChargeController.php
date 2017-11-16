<?php

namespace App\Http\Controllers;

use App\Charge;
use Illuminate\Http\Request;
use App\Http\Requests\ChargeRequest;
use Illuminate\Support\Facades\Response;

use App\Http\Relay\LogicRelay;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges = Charge::all();
        $charges->filter->societe;
        $charges->filter->marche;
        $charges->filter->responsable;
        $charges->filter->typecharge;
        return $charges;
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
    public function store(ChargeRequest $request)
    {
        $charge = Charge::create($request->toArray());
        return Response::json(['message' => 'Charge bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show($charge)
    {
        $charge = Charge::findOrfail($charge);
        $charge->societe;
        $charge->marche;
        $charge->responsable;
        $charge->typecharge;
        return Response::json($charge, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit(Charge $charge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(ChargeRequest $request, Charge $charge)
    {
        $charge = Charge::findOrfail($charge)->first();
        $charge->update($request->toArray());
        return Response::json(['message' => 'Charge bien mise à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Charge::destroy($id);
        return Response::json(['message' => 'Charge bien supprimé'], 200);
    }
}
