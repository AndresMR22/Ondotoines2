<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class SeguimientoController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.seguimiento.index',compact('pacientes'));
    }

    public function datosByPaciente($id)
    {
        $paciente = Paciente::find($id);
        $citas = $paciente->citas()->get();
        $tratamientos = $paciente->tratamientos()->get();
        foreach($tratamientos as $tra)
        {
            $proceds = $tra->procedimientos()->get();
            foreach($proceds as $pro)
            {
                $cantidad = $pro->tratamientos()->get(['cantidad']);
                $pro->setAttribute('cantidad',$cantidad[0]->cantidad);
            }
            $tra->setAttribute('procedimientos',$proceds);
        }

        // $tratamiento = Tratamiento::find($id);
        // $odonto = Odontograma::where('tratamiento_id',$tratamiento->id)->first();
        // $datos =  $odonto->cdps()->get();
        // $procesos = Proceso::all();
        // // dd($datos);
        // foreach($datos as $key => $dato)
        // {
        //     $diente = Diente::find($dato->diente_id);
        //     $dato->setAttribute('diente_id',$diente->posicion);
        //     $procesoId = $dato->proceso_id;
        //     $proceso = Proceso::find($procesoId);
        //     $color = $proceso->color;
        //     $descripcion = $proceso->descripcion;
        //     $dato->setAttribute('color',$color);
        //     $dato->setAttribute('descripcion',$descripcion);
        // }
        // $idTratamiento = $id;
        // $odontograma_id = $odonto->id;

        return view('admin.seguimiento.datosByPaciente',compact('citas','tratamientos'));
    }
}
