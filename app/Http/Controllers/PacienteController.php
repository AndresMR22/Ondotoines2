<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;

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
    public function store(StorePacienteRequest $request)
    {
        Paciente::create([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "edad"=>$request->edad,
            "lugar_nac"=>$request->lugar_nac,
            "ocupacion"=>$request->ocupacion,
            "direccion"=>$request->direccion,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "sexo"=>$request->sexo,
            "observacion"=>$request->observacion,
        ]);

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
    public function update(UpdatePacienteRequest $request, $id)
    {
       $paciente = Paciente::find($id);
       $paciente->update([
        "nombre"=>$request->nombre,
        "apellido"=>$request->apellido,
        "telefono"=>$request->telefono,
        "edad"=>$request->edad,
        "sexo"=>$request->sexo,
       ]);

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
        return back();
    }
}
