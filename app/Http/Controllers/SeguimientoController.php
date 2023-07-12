<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Diente;
use App\Models\Proceso;
use App\Models\Tratamiento;
use App\Models\Odontograma;

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

        // $paciente = Paciente::find($id);
        $odonto = Odontograma::where('paciente_id',$id)->first();

        $datos = null;
        if($odonto!=null)
        {
            $datos = $odonto->cdps()->get();
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
        }


        return view('admin.seguimiento.datosByPaciente',compact('datos','citas','tratamientos','paciente'));
    }
}
