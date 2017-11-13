<?php

namespace App\Http\Controllers;

use App\Responsable;
use Illuminate\Http\Request;
use App\Http\Requests\ResponsableRequest;
use Illuminate\Support\Facades\Response;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables = Responsable::all();
        return $responsables->toJson();
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
    public function store(ResponsableRequest $request)
    {
        $responsable = Responsable::create($request->toArray());
        return Response::json(['message' => 'Responsable bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        $responsable = Responsable::findOrfail($responsable)->first();
        return Response::json($responsable, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(ResponsableRequest $request, Responsable $responsable)
    {
        $responsable = Responsable::findOrfail($responsable)->first();
        $responsable->update($request->toArray());
        return Response::json(['message' => 'Responsable bien mis à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Responsable::destroy($id);
        return Response::json(['message' => 'Responsable bien supprimé'], 200);
    }
}
