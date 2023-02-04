<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Models\Diente;
use App\Models\Cara;
use App\Models\Tratamiento;
use App\Models\CaraDienteProceso;
use App\Models\Proceso;
use App\Models\Odontograma_cdp;
use App\Http\Requests\StoreOdontogramaRequest;
use App\Http\Requests\UpdateOdontogramaRequest;

class OdontogramaController extends Controller
{
    public function index()
    {
        return view('admin.odontograma.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreOdontogramaRequest $request)
    {
        $odontograma = Odontograma::create([
            "observacion"=>"Odontograma de prueba4",
            "tratamiento_id"=>1
        ]);
            
            
            foreach($request->procesos as $key => $proceso)
            {

                $idCara = $proceso['idCara'];
                $idDiente = $proceso['idDiente'];
                $diente = Diente::where('posicion',$idDiente)->first();
                $idReferencia = $proceso['idReferencia'];
                $posicionCara = $proceso['idCaraOriginal'];
                // dd($idCara,
                // $idDiente,
                // $idReferencia,
                // $posicionCara);
                $cara = Cara::find($idCara);
                $cara->dientes()->attach($diente->id,['proceso_id'=>$idReferencia,'posicion_cara'=>$posicionCara]);
                
                $cdp = CaraDienteProceso::orderBy('id','DESC')->take(1)->first();
                Odontograma_cdp::create([
                            "odontograma_id"=>$odontograma->id,
                            "cdp_id" => $cdp->id
                        ]);
            }
        
        return 1;
    }

    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);
        $odontogramas = $tratamiento->odontograma->get();
        // dd($odontogramas);
        $odonto = Odontograma::find($odontogramas[1]->id);//tiene que tratar de ser first un tratamiento un unico odontograma
        $datos =  $odonto->cdps()->get();
        foreach($datos as $key => $dato)
        {
            $procesoId = $dato->proceso_id;
            $proceso = Proceso::find($procesoId);
            $color = $proceso->color;
            $descripcion = $proceso->descripcion;
            $dato->setAttribute('color',$color);
            $dato->setAttribute('descripcion',$descripcion);
        }
        $idTratamiento = $id;
    return view('admin.odontograma.odontogramaEdit',compact('datos','idTratamiento'));
    }

    public function edit($idTratamiento)
    {
        return view('admin.odontograma.index',compact('idTratamiento'));
    }

    public function update(UpdateOdontogramaRequest $request, Odontograma $odontograma)
    {
        //
    }

    public function destroy(Odontograma $odontograma)
    {
        //
    }
}
