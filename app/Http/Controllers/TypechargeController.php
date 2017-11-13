<?php

namespace App\Http\Controllers;

use App\Typecharge;
use Illuminate\Http\Request;
use App\Http\Requests\TypechargeRequest;
use Illuminate\Support\Facades\Response;

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
    public function store(TypechargeRequest $request)
    {
        $typecharge = Typecharge::create($request->toArray());
        return Response::json(['message' => 'Typecharge bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function show(Typecharge $typecharge)
    {
        $typecharge = Typecharge::findOrfail($typecharge)->first();
        return Response::json($typecharge, 200);
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
    public function update(TypechargeRequest $request, Typecharge $typecharge)
    {
        $typecharge = Typecharge::findOrfail($typecharge)->first();
        $typecharge->update($request->toArray());
        return Response::json(['message' => 'Type charge bien mis à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typecharge  $typecharge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Typecharge::destroy($id);
        return Response::json(['message' => 'Type charge bien supprimé'], 200);
    }
}
