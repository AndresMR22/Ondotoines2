<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Mensaje;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;


class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        $citas = Cita::all();
        return view('admin.cita.index',compact('pacientes','citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('admin.cita.create',compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCitaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitaRequest $request)
    {
        
       $cita = Cita::create([
        "fecha_inicio"=>$request->fecha_inicio,
        "fecha_fin"=>$request->fecha_fin,
        "telefono"=>$request->telefono,
        "medico"=>$request->medico,
        "estado"=>"pendiente",
        "especialidad"=>$request->especialidad,
        "paciente_id"=>$request->paciente_id,
        "asunto" => $request->asunto
       ]);

       $paciente = Paciente::find($request->paciente_id);

       Evento::create([
        "start"=>$request->fecha_inicio,
        "end"=>$request->fecha_fin,
        "title"=>$paciente->nombre
       ]);

    //    $mensaje = Mensaje::create([
    //     "nombre"=>"Mensaje de prueba",
    //     "email"=>"gamr21@outlook.es",
    //     "telefono"=>"0988703045",
    //     "asunto"=>"Notificacion",
    //     "mensaje"=>"El paciente ha reservado una cita",

    //    ]);

      

       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCitaRequest  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitaRequest $request, $id)
    {
       $fechaInicio = $request->get('fecha_inicio');
       $fechaFin = $request->get('fecha_fin');
        $fechaInicio = str_replace('T',' ', $fechaInicio);
        $fechaFin = str_replace('T',' ', $fechaFin);
        $fechaInicio = $fechaInicio.':00';
        $fechaFin = $fechaFin.':00';

        $cita = Cita::find($id);
        $cita->update([
            "fecha_inicio"=>$fechaInicio,
            "fecha_fin"=>$fechaFin,
            "telefono"=>$request->telefono,
            "medico"=>$request->medico,
            "estado"=>$request->estado,
            "especialidad"=>$request->especialidad,
            "asunto" => $request->asunto
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cita::destroy($id);
        return back();
    }

    public function validarHorario(Request $request)
    {
        $citas = Cita::all();
        $fechaIni = $request->get('fechaIN');
        $fechaFin = $request->get('fechaFN');
        $fechaIni = str_replace("T","",$fechaIni);
        $fechaFin = str_replace("T","",$fechaFin);
       
        //
        $fechaInicioBD = null;$fechaFinBD = null;
        foreach($citas as $cita)
        {
            $fecha_inicio = $cita->fecha_inicio;
            $fecha_fin = $cita->fecha_fin;
            // dd($fecha_inicio, $fechaIni, $fechaFin);
            if(($fechaIni<$fecha_inicio && $fechaFin > $fecha_inicio) || ($fechaIni>=$fecha_inicio && $fechaIni<=$fecha_fin) ||  ($fechaFin>=$fecha_inicio && $fechaFin<=$fecha_fin))
            {
                $fechaInicioBD = $fecha_inicio;
                $fechaFinBD = $fecha_fin;
            }
        }
        // dd($esta);
       $fechas = array('fechaInicio'=>$fechaInicioBD, 'fechaFin'=>$fechaFinBD);
        return $fechas;
    }
}
