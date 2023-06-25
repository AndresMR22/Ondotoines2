<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        foreach($pacientes as $paciente)
        {
            $fechaNac = $paciente->fecha_nac;
            $nacimiento = new DateTime($fechaNac);
            $ahora = new DateTime(date("Y-m-d"));
            $diferencia = $ahora->diff($nacimiento);
            $paciente->setAttribute('edad',$diferencia->y);
        }
        return view('admin.paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            "apellido"=>'required|string|min:3|max:255',
            'fecha_nac' => 'required|date',
            "lugar_nac"=>'required|string',
            'ocupacion' => 'required|string',
            "direccion"=>'required|string',
            'cedula' => 'required|string|min:10|max:10',
            "telefono"=>'required|regex:/[0-9]{10}/',
            'sexo' => 'required|string',
            "observacion"=>'nullable|string',
            'correo' => 'required|email',
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'numeric'=>':attribute debe un valor numérico',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
            'date'=>':attribute debe ser de tipo fecha',
            'regex'=>':attribute no tiene el formato correcto',
            'email'=>':attribute no tiene formato correcto'
        ];
        $this->validate($request, $campos, $mensaje);

        Paciente::create([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "fecha_nac"=>$request->fecha_nac,
            "lugar_nac"=>$request->lugar_nac,
            "ocupacion"=>$request->ocupacion,
            "direccion"=>$request->direccion,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "sexo"=>$request->sexo,
            "observacion"=>$request->observacion,
            "correo" => $request->correo
        ]);

        Alert::toast('Paciente registrado', 'success');
        return redirect()->route('paciente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            "apellido"=>'required|string|min:3|max:255',
            'fecha_nac' => 'required|date',
            "lugar_nac"=>'required|string',
            "telefono"=>'required|regex:/[0-9]{10}/',
            'sexo' => 'required|string',
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'numeric'=>':attribute debe un valor numérico',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
            'date'=>':attribute debe ser de tipo fecha',
            'regex'=>':attribute no tiene el formato correcto',
            'email'=>':attribute no tiene formato correcto'
        ];
        $this->validate($request, $campos, $mensaje);

       $paciente = Paciente::find($id);
       $paciente->update([
        "nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        "telefono"=>$request->telefono,
        "fecha_nac"=>$request->fecha_nac,
        "lugar_nac"=>$request->lugar_nac,
        "sexo"=>$request->sexo,
        "correo"=>$request->correo
       ]);

       Alert::toast('Paciente actualizado', 'success');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paciente::destroy($id);
        Alert::toast('Paciente eliminado', 'success');
        return back();
    }
}
