<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Http\Requests\StoreOdontogramaRequest;
use App\Http\Requests\UpdateOdontogramaRequest;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.odontograma.index');
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
     * @param  \App\Http\Requests\StoreOdontogramaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOdontogramaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odontograma  $odontograma
     * @return \Illuminate\Http\Response
     */
    public function show(Odontograma $odontograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Odontograma  $odontograma
     * @return \Illuminate\Http\Response
     */
    public function edit(Odontograma $odontograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOdontogramaRequest  $request
     * @param  \App\Models\Odontograma  $odontograma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOdontogramaRequest $request, Odontograma $odontograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odontograma  $odontograma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odontograma $odontograma)
    {
        //
    }
}
