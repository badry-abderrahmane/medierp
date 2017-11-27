<?php

namespace App\Http\Controllers;

use App\Alimentation;
use Illuminate\Http\Request;
use App\Http\Requests\AlimentationRequest;
use Illuminate\Support\Facades\Response;

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
      $alimentations->filter->responsable;
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
    public function store(AlimentationRequest $request)
    {
        $alimentation = Alimentation::create($request->toArray());
        return Response::json(['message' => 'Alimentation bien ajouté'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimentation = Alimentation::findOrfail($id);
        $alimentation->responsable;
        return Response::json($alimentation, 200);
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
    public function update(AlimentationRequest $request, $id)
    {
        $alimentation = Alimentation::findOrfail($id);
        $alimentation->update($request->toArray());
        return Response::json(['message' => 'Alimentation bien mise à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alimentation::destroy($id);
        return Response::json(['message' => 'Alimentation bien supprimé'], 200);
    }
}
