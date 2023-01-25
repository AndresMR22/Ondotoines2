<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\Procedimiento;
use Illuminate\Http\Request;
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
            $arrayCant = $tra->procedimientos()->get(['cantidad']);
            foreach($proceds as $key => $pro)
            {
                // $cantidad = $pro->tratamientos()->get(['cantidad']); no es correcto
                $pro->setAttribute('cantidad',$arrayCant[$key]->cantidad);
                $pro->setAttribute('precioPorCantidad',$arrayCant[$key]->cantidad*$pro->precio);
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

        $procedimientos = $request->procedimientos;
        $procedimientos = json_decode($procedimientos);
        
        if(count($procedimientos)==0)
        {
            return back()->with('mensaje','El tratamiento debe tener mínimo 1 procedimiento.');
        }
        
        $tratamiento =  Tratamiento::create([
            "asunto"=>$request->asunto,
            "observacion"=>$request->observacion,
            "especialidad"=>$request->especialidad,
            "medico"=>$request->medico,
            "paciente_id"=>$request->paciente_id,
        ]);

        

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

 
    public function editarTratamiento(Request $request)
    {
        
        $tratamiento = Tratamiento::find($request->id);

        if($tratamiento!=null)
        {
            $tratamiento->update([
                "asunto"=>$request->asunto,
                "especialidad"=>$request->especialidad,
                "medico",$request->medico
            ]);
    
            $cantidades = $request->data;
    
            for($i = 0; $i<count($cantidades); $i++)
            {
                $procedimientoid = $cantidades[$i]["id"];
                $cantidad = $cantidades[$i]["cantidad"];
                //actualiza un campo de una relacion one-many
                $tratamiento->procedimientos()->where('procedimiento_id', $procedimientoid)->where('tratamiento_id',$tratamiento->id)->update(['cantidad' => $cantidad]);
            }
    
            return 1;
        }
       
        return 0;
    }

    public function edit($id)
    {

            $tratamiento = Tratamiento::find($id);
            $proceds = $tratamiento->procedimientos()->get();

            $arrayCant = $tratamiento->procedimientos()->get(['cantidad']);

            foreach($proceds as $key => $pro)
            {
                $cantidad = $pro->tratamientos()->get(['cantidad']);
                $pro->setAttribute('cantidad',$arrayCant[$key]->cantidad);
                $pro->setAttribute('precioPorCantidad',$arrayCant[$key]->cantidad*$pro->precio);
            }
            $tratamiento->setAttribute('procedimientos',$proceds);
        return view('admin.tratamiento.edit',compact('tratamiento'));
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
