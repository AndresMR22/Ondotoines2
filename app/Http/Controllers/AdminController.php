<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cita;
use App\Models\Tratamiento;
use App\Models\Procedimiento;
use App\Models\Paciente;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon; 

class AdminController extends Controller
{
    

    public function dashboard()
    {
        $pacientes = Paciente::orderBy('id', 'DESC')->take(5)->get();
        $procedimientos = Procedimiento::all();
        $citas = Cita::all();
        $admins = User::all();
        // $tratamientos = Tratamiento::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();
        $tratamientos = Tratamiento::all();
        $tratamientosRecientes = Tratamiento::orderBy('id', 'DESC')->take(3)->get();

        $totalCosto = 0;
        $totalesHoy = array();
        $numerosTratamiento = array();
        $observaciones = array();

        foreach($tratamientosRecientes as $tra)
        {
            $pros = $tra->procedimientos()->get();
            $cants = $tra->procedimientos()->get(['cantidad']);
            foreach($pros as $key => $pro)
            {
                $total = $pro->precio*$cants[$key]->cantidad;
                $totalCosto = $totalCosto+$total;
            }
            $tra->setAttribute('costoTratamiento',$totalCosto);
            $totalCosto = 0;
        }

        foreach($tratamientos as $tra)
        {
            $pros = $tra->procedimientos()->get();
            $cants = $tra->procedimientos()->get(['cantidad']);
            foreach($pros as $key => $pro)
            {
                $total = $pro->precio*$cants[$key]->cantidad;
                $totalCosto = $totalCosto+$total;
            }
            $tra->setAttribute('costoTratamiento',$totalCosto);
            array_push($totalesHoy,$totalCosto);
            array_push($numerosTratamiento,$tra->created_at->format('d/m/Y'));
            array_push($observaciones,$tra->observacion);
            $totalCosto = 0;
        }
        // dd($tratamientos);
        // dd($observaciones);
        $totalesHoy = json_encode($totalesHoy);
        $numerosTratamiento = json_encode($numerosTratamiento);
        // dd($numerosTratamiento);
        $observaciones = json_encode($observaciones);
 

        // dd($totalCosto);

        return view('admin.estadisticas',compact('pacientes','procedimientos','citas','admins','tratamientos','tratamientosRecientes','totalesHoy','numerosTratamiento','observaciones'));
    }
    public function index()
    {
        //
    }

    public function calendario()
    {
        $citas = Cita::all();
        $citas = DB::table('eventos')->get();
        // ->select(DB::raw('citas.medico as title, DATE_FORMAT(citas.fecha_inicio, "%Y-%m-%d %h-%i-%s") as start'))
        // ->get();
        // dd($citas);
        return view('admin.cita.calendario',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::role('Administrador')->get();
        return view("admin.administrador.index",compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|min:3|max:255',
        ];

        $mensaje = [
            'required' => ':attribute es requerido',
            'nombre.max' => 'El nombre no debe sobrepasar los 255 caracteres',
            'nombre.min' => 'El nombre no debe tener menos de 3 caracteres',
            'nombre.string' => 'El nombre debe ser una cadena de tipo texto'
        ];

        $this->validate($request, $campos, $mensaje);

        $admin = User::find($id);
        $admin->update(["name"=>$request->nombre]);

        $public_id = "";$url="";
        if(isset($admin->imagen->public_id) && isset($admin->imagen->url))
        {
            $public_id = $admin->imagen->public_id;
            $url = $admin->imagen->url;
        }
       
  
        if($request->hasFile('foto'))// si viene una imagen 
        {
          $file = $request->foto;
          $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'administradores']);
          $public_id = $elemento->getPublicId();
          $url = $elemento->getSecurePath();
        }
        
  
  if(is_null($admin->imagen)){// si existe una imagen anterior, la sobreescribe
        $admin->imagen()->create([
            'url'=>$url,
            'public_id'=>$public_id
            ]);
  }else{
      $pid = $admin->imagen->public_id;
      if(isset($pid)){
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $admin->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
              $admin->imagen()->update([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
            }
      }
      Alert::toast('Administrador actualizado', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::find($id);
        if(isset($user->imagen))
        {
            $imagen_id = $user->imagen->id;
            $public_id = $user->imagen->public_id;
            Imagen::destroy($imagen_id);//eliminamos el registro de la imagen que depende de la clase procedimiento
            Cloudinary::destroy($public_id); //eliminamos la imagen de la procedimiento de la nube
        }
        User::destroy($id);
        Alert::toast('Administrador eliminado', 'success');
        return back();
    }
}
