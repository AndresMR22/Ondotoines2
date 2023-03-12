<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::toast('Medico agregado', 'success');
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
       Alert::toast('Medico actualizado', 'success');
       return back();
    }

    public function destroy($id)
    {
        Medico::destroy($id);
        Alert::toast('Medico eliminado', 'success');
        return back();
    }
}
