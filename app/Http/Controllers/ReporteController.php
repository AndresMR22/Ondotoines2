<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Http\Requests\StoreReporteRequest;
use App\Http\Requests\UpdateReporteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reporte.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReporteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opcion = $request->get('opcion');
        $fechaInicio = $request->get('fecha_inicio');
        $fechaFin = $request->get('fecha_fin');
        $tratamientos = null; $pacientes = null;
        if($opcion==1)//tratamientos
        {
            // $tratamientos = Tratamiento::where('created_at',$fechaInicio)->get();
            $tratamientos = Tratamiento::where('created_at','>',$fechaInicio)->where('created_at','<=',$fechaFin)->get();
            //$tratamientos = DB::select('select * from tratamientos where created_at >= :fecha_inicio and created_at <= :fecha_fin ', ['fecha_inicio' => $fechaInicio, 'fecha_fin'=>$fechaFin]);
            // dd($tratamientos);

            $pdf = PDF::loadView('admin.pdf.reporteTratamientos', compact('tratamientos','fechaInicio','fechaFin')); // se carga la data en la plantilla
            return $pdf->stream('Reporte de tratamientos.pdf'); //retorna el pdf con el nombre compra_creditos.pdf
        }
        elseif($opcion == 2)
        {
            $pacientes = DB::select('select * from pacientes where created_at >= :fecha_inicio and created_at <= :fecha_fin ', ['fecha_inicio' => $fechaInicio, 'fecha_fin'=>$fechaFin]);
            $pdf = PDF::loadView('admin.pdf.reportePacientes', compact('pacientes','fechaInicio','fechaFin')); // se carga la data en la plantilla
            return $pdf->stream('Reporte de pacientes.pdf'); //retorna el pdf con el nombre compra_creditos.pdf
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReporteRequest  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReporteRequest $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
