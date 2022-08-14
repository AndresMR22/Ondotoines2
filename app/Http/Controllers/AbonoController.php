<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Deuda;
use App\Models\Cliente;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AbonoController extends Controller
{
    
    public function abonosByCliente($cliente_id)
    {
        $deuda = Deuda::where('cliente_id',$cliente_id)->first();
        $abonos = $deuda->abonos()->get();
        $saldo = $deuda->saldo;
        return view('admin.abono.abonosByCliente',compact('abonos','saldo'));
    }

    public function index()
    {

        $clientes = Cliente::all();
        return view('admin.abono.index',compact('clientes'));
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

    
    public function store(Request $request)
    {

        $deuda = Deuda::find($request->deuda_id);
        $saldo = $deuda->saldo;
        $saldo = $saldo-$request->valor;
        if($saldo<0){return back()->with('mensaje','El valor pagado sobrepasa el valor por pagar, intente nuevamente.');}
        $abono = Abono::create([
            "valor"=>$request->valor,
            "deuda_id"=>$deuda->id
        ]);
        $deuda->update([
            "saldo"=>$saldo
        ]);

        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'abonos']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $abono->imagen()->create([
                "url" => $url,
                "public_id" => $public_id
            ]);

        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $abono = Abono::find($request->abono_id);
    
            $abono->update([
                "valor"=>$request->valor
            ]);
            
            $deuda = Deuda::find($request->deuda_id);
            $abonos = $deuda->abonos()->get();
            $sumaAbonos = 0;
            foreach($abonos as $abono)
            {
                $sumaAbonos = $sumaAbonos + $abono->valor;
            }
            $totalPagar = $deuda->cuota*$deuda->meses;
            $saldoNuevo = $totalPagar - $sumaAbonos;
            $deuda->update([
                "saldo"=>$saldoNuevo
            ]);


   
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Abono::destroy($id);
    }
}
