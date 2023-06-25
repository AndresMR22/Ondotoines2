<?php

namespace App\Http\Controllers;

use App\Models\Procedimiento;
use App\Models\Imagen;
use App\Http\Requests\StoreProcedimientoRequest;
use App\Http\Requests\UpdateProcedimientoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProcedimientoController extends Controller
{

    public function index()
    {
        $procedimientos = Procedimiento::all();
        return view('admin.procedimiento.index',compact('procedimientos'));
    }


    public function create()
    {
        return view('admin.procedimiento.create');
    }


    public function store(Request $request)
    {

        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            "precio"=>'required|numeric',
            "imagen"=>'required|image|mimes:jpeg,png'
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'image' => ':attribute no es una imagen',
            'mimes' => ':attribute no tiene un formato jpeg o png',
            'numeric'=>':attribute debe un valor numérico',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
        ];
        $this->validate($request, $campos, $mensaje);

        $procedimiento = Procedimiento::create([
            "nombre"=>$request->nombre,
            "precio"=>$request->precio
        ]);

        if(request()->hasFile('imagen'))
        {
            $file = request()->file('imagen');
                     $elemento = Cloudinary::upload($file->getRealPath(),['folder'=>'procedimientos']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $procedimiento->imagen()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
        }
        Alert::toast('Procedimiento registrado', 'success');
        return redirect()->route('procedimiento.index');
    }


    public function show(Procedimiento $procedimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimiento $procedimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcedimientoRequest  $request
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'nombre' => 'required|string|min:3|max:255',
            "precio"=>'required|numeric',
            "foto"=>'required|image|mimes:jpeg,png'
        ];
        $mensaje = [
            'required' => ':attribute es requerido',
            'image' => ':attribute no es una imagen',
            'mimes' => ':attribute no tiene un formato jpeg o png',
            'numeric'=>':attribute debe un valor numérico',
            'max' => ':attribute no debe sobrepasar los 255 caracteres',
            'min' => ':attribute no debe tener menos de 3 caracteres',
            'string' => ':attribute debe ser una cadena de tipo texto',
        ];
        $this->validate($request, $campos, $mensaje);


        $procedimiento = Procedimiento::find($id);
        $procedimiento->update([
            "nombre"=>$request->nombre,
            "precio"=>$request->precio,
        ]);

        $public_id = "";$url="";
        if(isset($procedimiento->imagen->public_id) && isset($procedimiento->imagen->url))
        {
            $public_id = $procedimiento->imagen->public_id;
            $url = $procedimiento->imagen->url;
        }


        if($request->hasFile('foto'))// si viene una imagen
        {
          $file = $request->foto;
          $elemento= Cloudinary::upload($file->getRealPath(),['folder'=>'procedimientos']);
          $public_id = $elemento->getPublicId();
          $url = $elemento->getSecurePath();
        }


  if(is_null($procedimiento->imagen)){// si existe una imagen anterior, la sobreescribe
        $procedimiento->imagen()->create([
            'url'=>$url,
            'public_id'=>$public_id
            ]);
  }else{
      $pid = $procedimiento->imagen->public_id;
      if(isset($pid)){
          Cloudinary::destroy($pid);//Eliminamos la imagen anterior de cloud
          $procedimiento->imagen()->update([
              'url'=>$url,
              'public_id'=>$public_id
              ]);
              $procedimiento->imagen()->update([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);
            }
      }

      Alert::toast('Procedimiento actualizado', 'success');
        return redirect()->route('procedimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedimiento = Procedimiento::find($id);
        if(isset($procedimiento->imagen))
        {
            $imagen_id = $procedimiento->imagen->id;
            $public_id = $procedimiento->imagen->public_id;
            Imagen::destroy($imagen_id);//eliminamos el registro de la imagen que depende de la clase procedimiento
            Cloudinary::destroy($public_id); //eliminamos la imagen de la procedimiento de la nube
        }

        Procedimiento::destroy($id); // eliminamos la procedimiento con sus datos, nombre, etc.
        Alert::toast('Procedimiento eliminado', 'success');
        return back();
    }
}
