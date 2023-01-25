<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoriaController extends Controller
{
   
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.index',compact('categorias'));
    }

   
    public function create()
    {
        return view('admin.categoria.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        $categoria = Categoria::create([
            "nombre"=>$request->nombre
        ]);
        
        if(request()->hasFile('imagen')){
            $file = request()->file('imagen');
            // foreach($images as $image){
                     $elemento = Cloudinary::upload($file->getRealPath(),['folder'=>'categorias']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $categoria->imagen()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);   
            // }//fin foreach   
        }
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }


    public function update(Request $request)
    {
        $categoria = Categoria::find($request->categoria_id);
    
        $categoria->update([
            "nombre"=>$request->nombre,
        ]);
        if(request()->hasFile('imagen')){
            $images = request()->file('imagen');
            foreach($images as $image){
                     $elemento = Cloudinary::upload($image->getRealPath(),['folder'=>'categorias']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $categoria->imagen()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);   
            }//fin foreach   
        }

        return back();
    }

   
    public function destroy($id)
    {
        Categoria::destroy($id);
        return back();
    }
}
