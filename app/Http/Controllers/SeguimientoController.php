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

        return view('admin.seguimiento.datosByPaciente',compact('citas','tratamientos'));
    }
}
