<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Models\Diente;
use App\Models\Cara;
use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\CaraDienteProceso;
use App\Models\Proceso;
use Illuminate\Http\Request;
use App\Models\Odontograma_cdp;
use App\Http\Requests\StoreOdontogramaRequest;
use App\Http\Requests\UpdateOdontogramaRequest;
use RealRashid\SweetAlert\Facades\Alert;


class OdontogramaController extends Controller
{
    public function index()
    {
        $procesos = Proceso::all();
        return view('admin.odontograma.index','procesos');
    }

    public function create()
    {
    }

    public function store(StoreOdontogramaRequest $request)
    {
        // dd($request->get('procesos'));
        $odontograma = Odontograma::create([
            "observacion"=>"Odontograma de prueba4",
            "paciente_id"=>$request->get('idPaciente')
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

            Alert::toast('Odontograma guardado', 'success');

        return 1;
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        $odonto = Odontograma::where('paciente_id',$paciente->id)->first();
        $datos =  $odonto->cdps()->get();
        $procesos = Proceso::all();

        // dd($odonto, $datos, $procesos);

        foreach($datos as $key => $dato)
        {
            $diente = Diente::find($dato->diente_id);
            $dato->setAttribute('diente_id',$diente->posicion);
            $procesoId = $dato->proceso_id;
            $proceso = Proceso::find($procesoId);
            $color = $proceso->color;
            $descripcion = $proceso->descripcion;
            $dato->setAttribute('color',$color);
            $dato->setAttribute('descripcion',$descripcion);
        }

        $idPaciente = $id;
        $odontograma_id = $odonto->id;

    return view('admin.odontograma.odontogramaEdit',compact('datos','idPaciente','odontograma_id','procesos'));
    }



    public function edit($idPaciente)
    {
        $procesos = Proceso::all();
        return view('admin.odontograma.index',compact('idPaciente','procesos'));
    }

    public function update(UpdateOdontogramaRequest $request, Odontograma $odontograma)
    {

    }

    public function actualizarOdontograma(Request $request)
    {
        // dd($request->get('procesos'));
        $procesos = $request->get('procesos');
        // dd($procesos);
        $odontograma = Odontograma::find($request->odontograma_id);
        // dd($odontograma->cdps()->get());

        //elimino los cdps del odontograma editado
        foreach($odontograma->cdps()->get() as $cdp)
        {
            CaraDienteProceso::destroy($cdp->id);
        }
        //coloco los nuevos cdps para el odontograma editado
        // dd($procesos);
        foreach($procesos as $key => $proceso)
        {
            // dd($proceso);
            $idCara = $proceso['cara_id'];
            $idDiente = $proceso['diente_id'];
            $diente = Diente::where('posicion',$idDiente)->first();

            $idReferencia = $proceso['proceso_id'];
            $posicionCara = $proceso['posicion_cara'];

            $cara = Cara::find($idCara);
            $cara->dientes()->attach($diente->id,['proceso_id'=>$idReferencia,'posicion_cara'=>$posicionCara]);

            $cdp = CaraDienteProceso::orderBy('id','DESC')->take(1)->first();
            Odontograma_cdp::create([
                        "odontograma_id"=>$odontograma->id,
                        "cdp_id" => $cdp->id
                    ]);

        }
        Alert::toast('Odontograma actualizado', 'success');
        return 1;
        // dd($odontograma->cdps()->get());

    }

    public function destroy(Odontograma $odontograma)
    {
        //
    }
}
