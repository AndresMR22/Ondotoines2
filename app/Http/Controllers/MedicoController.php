<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {

        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            'especialidad' => 'required|string|min:3|max:255',
            'telefono'=> 'required'
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto'
        ];
        $this->validate($request, $campos, $mensaje);

        Medico::create([
            "nombre"=>$request->nombre,
            "especialidad"=>$request->especialidad,
            "telefono"=>$request->telefono
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

    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            'especialidad' => 'required|string|min:3|max:255',
            'telefono'=>'required'

        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max' => 'El nombre no debe sobrepasar los 255 caracteres',
            'nombre.min' => 'El nombre no debe tener menos de 3 caracteres',
            'nombre.string' => 'El nombre debe ser una cadena de tipo texto'
        ];
        $this->validate($request, $campos, $mensaje);

        $medico = Medico::find($id);
       $medico->update([
        "nombre"=>$request->nombre,
        "especialidad"=>$request->especialidad,
        "telefono"=>$request->telefono
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
