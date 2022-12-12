<?php

namespace App\Http\Controllers;

use App\Models\Procedimiento;
use App\Http\Requests\StoreProcedimientoRequest;
use App\Http\Requests\UpdateProcedimientoRequest;

class ProcedimientoController extends Controller
{
   
    public function index()
    {
        $procedimientos = Procedimiento::all();
        return view('admin.procedimiento.index',compact('procedimientos'));
    }

    
    public function create()
    {
        return view('admin.procedimiento.create');
    }

   
    public function store(StoreProcedimientoRequest $request)
    {
        Procedimiento::create([
            "nombre"=>$request->nombre,
            "precio"=>$request->precio
        ]);
        return back();
    }

    
    public function show(Procedimiento $procedimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimiento $procedimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcedimientoRequest  $request
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcedimientoRequest $request, $id)
    {
        $procedimiento = Procedimiento::find($id);
        $procedimiento->update([
            "nombre"=>$request->nombre,
            "precio"=>$request->precio,
        ]);
        return redirect()->route('procedimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Procedimiento::destroy($id);
        return back();
    }
}
