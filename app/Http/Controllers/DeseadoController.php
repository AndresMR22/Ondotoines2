<?php

namespace App\Http\Controllers;

use App\Models\Deseado;
use App\Http\Requests\StoreDeseadoRequest;
use App\Http\Requests\UpdateDeseadoRequest;

class DeseadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDeseadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeseadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deseado  $deseado
     * @return \Illuminate\Http\Response
     */
    public function show(Deseado $deseado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deseado  $deseado
     * @return \Illuminate\Http\Response
     */
    public function edit(Deseado $deseado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeseadoRequest  $request
     * @param  \App\Models\Deseado  $deseado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeseadoRequest $request, Deseado $deseado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deseado  $deseado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deseado $deseado)
    {
        //
    }
}
