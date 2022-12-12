<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\Procedimiento;
use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;

class TratamientoController extends Controller
{
   
    public function index()
    {
        $tratamientos = Tratamiento::all();
        
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
        return view('admin.tratamiento.index',compact('tratamientos'));
    }

  
    public function create()
    {
        $pacientes = Paciente::all();
        $procedimientos = Procedimiento::all();
        return view('admin.tratamiento.create',compact('pacientes','procedimientos'));
    }

   
    public function store(StoreTratamientoRequest $request)
    {
        $tratamiento =  Tratamiento::create([
            "asunto"=>$request->asunto,
            "observacion"=>$request->observacion,
            "especialidad"=>$request->especialidad,
            "medico"=>$request->medico,
            "paciente_id"=>$request->paciente_id,
        ]);

        $procedimientos = $request->procedimientos;
        $procedimientos = json_decode($procedimientos);
        
        foreach($procedimientos as $pro)
        {
            $proce = Procedimiento::find($pro->id);
            $proce->tratamientos()->attach($tratamiento->id, ['cantidad'=>$pro->cantidad]);
        }
        //foreach de creacion de procedimientos
        //atach con id de creacion de procedimiento con el de tratamiento
        return redirect()->route('tratamiento.index');
    }

    public function show(Tratamiento $tratamiento)
    {
        //
    }

 
    public function edit(Tratamiento $tratamiento)
    {
        //
    }

    
    public function update(UpdateTratamientoRequest $request, $id)
    {
       $tra =  Tratamiento::find($id);
       
       $tra->update([
        "asunto"=>$request->get('asunto'),
        "observacion"=>$request->get('observacion'),
        "especialidad"=>$request->get('especialidad'),
        "medico"=>$request->get('medico'),
       ]);

       return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tratamiento::destroy($id);
        return back();
    }
}
