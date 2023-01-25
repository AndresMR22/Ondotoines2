<?php

namespace App\Http\Controllers;

use App\Models\Procedimiento;
use App\Models\Imagen;
use App\Http\Requests\StoreProcedimientoRequest;
use App\Http\Requests\UpdateProcedimientoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

   
    public function store(StoreProcedimientoRequest $request)
    {
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
    public function update(UpdateProcedimientoRequest $request, $id)
    {
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
     
        return back();
    }
}
