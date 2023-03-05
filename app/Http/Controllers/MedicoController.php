<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;

class MedicoController extends Controller
{

    public function index()
    {
        $medicos = Medico::all();
        return view('admin.medico.index',compact('medicos'));
    }

    public function create()
    {
        return view('admin.medico.create');
    }

    public function store(StoreMedicoRequest $request)
    {
        Medico::create([
            "nombre"=>$request->nombre,
            "especialidad"=>$request->especialidad
        ]);

        return redirect()->route('medico.index');
    }

    public function show(Medico $medico)
    {
        //
    }

    public function edit(Medico $medico)
    {
        //
    }

    public function update(UpdateMedicoRequest $request, $id)
    {
        $medico = Medico::find($id);
       $medico->update([
        "nombre"=>$request->nombre,
        "especialidad"=>$request->especialidad,
       ]);

       return back();
    }

    public function destroy($id)
    {
        Medico::destroy($id);
        return back();
    }
}
