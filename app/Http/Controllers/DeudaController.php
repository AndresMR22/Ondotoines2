<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use App\Models\Cliente;
use App\Http\Requests\StoreDeudaRequest;
use App\Http\Requests\UpdateDeudaRequest;

class DeudaController extends Controller
{
 
    public function asignarDeuda($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        return view('admin.deuda.create',compact('cliente'));
    }


    public function index()
    {
       $deudas = Deuda::all();
        return view('admin.deuda.index',compact('deudas'));
    }

 
    public function create()
    {
        //
    }

   
    public function store(StoreDeudaRequest $request)
    {
        Deuda::create([
            "cuota"=>$request->cuota,
            "saldo"=>$request->saldo,
            "cliente_id"=>$request->cliente_id
        ]);
        return redirect()->route('deuda.index');
    }

   
    public function show(Deuda $deuda)
    {
        //
    }

    public function edit(Deuda $deuda)
    {
        //
    }

  
    public function update(UpdateDeudaRequest $request)
    {
        $deuda = Deuda::find($request->deuda_id);
    
        $deuda->update([
            "cuota"=>$request->cuota,
            "meses"=>$request->meses,
            "saldo"=>$request->saldo,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        Deuda::destroy($id);
        return back();
    }
}
