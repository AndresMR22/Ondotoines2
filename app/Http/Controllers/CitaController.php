<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Mensaje;
use App\Models\Medico;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use RealRashid\SweetAlert\Facades\Alert;


class CitaController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::all();
        $citas = Cita::all();
        $medicos = Medico::all();
        return view('admin.cita.index',compact('pacientes','citas','medicos'));
    }


    public function create()
    {
        $pacientes = Paciente::all();
        return view('admin.cita.create',compact('pacientes'));
    }

    public function marcar_una_leida($notificacion_id, $cita_id){
        auth()->user()->unreadNotifications->when($notificacion_id, function ($query) use
        ($notificacion_id){
            return $query->where('id',$notificacion_id);
        })->markAsRead();
        $cita = Cita::findOrFail($cita_id);
        return redirect()->route('cita.show', $cita->id);
    }


    public function store(Request $request)
    {

        $campos = [
            'medico' => 'required|numeric',
            'especialidad' => 'required|string|min:3|max:255',
            "fecha_inicio"=>'required|date',
            "fecha_fin"=>'required|date',
            "telefono"=>'required|regex:/[0-9]{10}/'
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'numeric' => ':attribute debe ser un número',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
            'date'=>':attribute debe ser de tipo fecha',
            'regex'=>':attribute no tiene el formato correcto'
        ];
        $this->validate($request, $campos, $mensaje);


        $medico = Medico::find($request->medico);
       $cita = Cita::create([
        "fecha_inicio"=>$request->fecha_inicio,
        "fecha_fin"=>$request->fecha_fin,
        "telefono"=>$request->telefono,
        "medico"=>$medico->nombre,
        "estado"=>"pendiente",
        "especialidad"=>$request->especialidad,
        "paciente_id"=>$request->paciente_id,
        "asunto" => $request->asunto
       ]);

       if($cita != null || $cita != "")
       {
        $paciente = Paciente::find($request->paciente_id);

        Evento::create([
         "start"=>$request->fecha_inicio,
         "end"=>$request->fecha_fin,
         "title"=>$paciente->nombre
        ]);
        Alert::toast('Cita agendada', 'success');
       }else
       {
        Alert::toast('Hubo problemas para agendar la cita', 'warning');
       }



    //    $mensaje = Mensaje::create([
    //     "nombre"=>"Mensaje de prueba",
    //     "email"=>"gamr21@outlook.es",
    //     "telefono"=>"0988703045",
    //     "asunto"=>"Notificacion",
    //     "mensaje"=>"El paciente ha reservado una cita",

    //    ]);



       return back();
    }


    public function show($id)
    {
        $cita = Cita::find($id);
        $paciente = Paciente::find($cita->paciente_id);
        return view('admin.cita.show',compact('cita','paciente'));
    }

    public function verNotificaciones()
    {
        $notificaciones = Mensaje::all();
        auth()->user()->unreadNotifications->markAsRead();
        return view('admin.notificacion.index',compact('notificaciones'));
    }


    public function edit(Cita $cita)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $campos = [
            'medico' => 'required|string|min:3|max:255',
            'especialidad' => 'required|string|min:3|max:255',
            "fecha_inicio"=>'required|date',
            "fecha_fin"=>'required|date',
            "telefono"=>'required|regex:/[0-9]{10}/'

        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
            'date'=>':attribute debe ser de tipo fecha',
            'regex'=>':attribute no tiene el formato correcto'
        ];
        $this->validate($request, $campos, $mensaje);


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
        Alert::toast('Cita actualizada', 'success');
        return back();
    }


    public function destroy($id)
    {
        Cita::destroy($id);
        Alert::toast('Cita eliminada', 'success');
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

    public function eliminarNotificacion($id)
    {
        Mensaje::destroy($id);
        return back();
    }


}
