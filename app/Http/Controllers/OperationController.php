<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use App\Http\Requests\OperationRequest;
use Illuminate\Support\Facades\Response;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::all();
        return $operations->toJson();
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
    public function store(OperationRequest $request)
    {
        $operation = Operation::create($request->toArray());
        return Response::json(['message' => 'Operation bien ajoutée'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        $operation = Operation::findOrfail($operation)->first();
        return Response::json($operation, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(OperationRequest $request, Operation $operation)
    {
        $operation = Operation::findOrfail($operation)->first();
        $operation->update($request->toArray());
        return Response::json(['message' => 'Operation bien mise à jour'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Operation::destroy($id);
        return Response::json(['message' => 'Operation bien supprimée'], 200);
    }
}
