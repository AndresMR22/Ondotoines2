<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminController extends Controller
{
    

    public function dashboard()
    {
        $pacientes = Paciente::all();
        $citas = Cita::all();

        return view('admin.estadisticas',compact('pacientes','citas'));
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

        return back();
    }
}
