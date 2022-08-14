<?php

namespace App\Http\Controllers;

use App\Models\OrdenDetail;
use App\Http\Requests\StoreOrdenDetailRequest;
use App\Http\Requests\UpdateOrdenDetailRequest;

class OrdenDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreOrdenDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdenDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenDetail  $ordenDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenDetail $ordenDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenDetail  $ordenDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenDetail $ordenDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdenDetailRequest  $request
     * @param  \App\Models\OrdenDetail  $ordenDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdenDetailRequest $request, OrdenDetail $ordenDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenDetail  $ordenDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenDetail $ordenDetail)
    {
        //
    }
}
