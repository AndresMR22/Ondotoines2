<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Models\Diente;
use App\Models\Cara;
use App\Models\CaraDienteProceso;
use App\Models\Odontograma_cdp;
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

    
    public function store(StoreOdontogramaRequest $request)
    {
        // dd($request);
        $odontograma = Odontograma::create([
            "observacion"=>"Odontograma de prueba",
            "tratamiento_id"=>$request->idTratamiento
        ]);
            // dd($request);
        $idCara = $request->procesos[0]['idCara'];
        $idDiente = $request->procesos[0]['idDiente'];
        $idReferencia = $request->procesos[0]['idReferencia'];

        // dd($idCara,$idDiente,$idReferencia);
        // $diente = Diente::find($idDiente);
        $cara = Cara::find($idCara);
        $cara->dientes()->attach($idDiente,['proceso_id'=>$idReferencia]);
        // $diente->caras()->attach($idCara,['proceso_id'=>$idReferencia]);
        
        $cdp = CaraDienteProceso::orderBy('id','DESC')->take(1)->first();
                Odontograma_cdp::create([
                    "odontograma_id"=>$odontograma->id,
                    "cdp_id" => $cdp->id
                ]);
    

        return 1;
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
    public function edit($idTratamiento)
    {
        return view('admin.odontograma.index',compact('idTratamiento'));
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
