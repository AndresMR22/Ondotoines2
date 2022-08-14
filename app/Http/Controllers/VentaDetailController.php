<?php

namespace App\Http\Controllers;

use App\Models\VentaDetail;
use App\Http\Requests\StoreVentaDetailRequest;
use App\Http\Requests\UpdateVentaDetailRequest;

class VentaDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreVentaDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentaDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VentaDetail  $ventaDetail
     * @return \Illuminate\Http\Response
     */
    public function show(VentaDetail $ventaDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VentaDetail  $ventaDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(VentaDetail $ventaDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVentaDetailRequest  $request
     * @param  \App\Models\VentaDetail  $ventaDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaDetailRequest $request, VentaDetail $ventaDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VentaDetail  $ventaDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(VentaDetail $ventaDetail)
    {
        //
    }
}
