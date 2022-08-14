<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubcategoriaRequest;
use App\Http\Requests\UpdateSubcategoriaRequest;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function subcategoriasByCategoria($categoria_id)
    {
        $subcategorias = Subcategoria::where('categoria_id',$categoria_id)->get();
        return $subcategorias;
    }

    public function index()
    {
        $subcategorias = Subcategoria::all();
      return view('admin.subcategoria.index',compact('subcategorias'));
    }

    public function create()
    {
    $categorias = Categoria::all();
    return view('admin.subcategoria.create', compact('categorias'));
    }

    public function store(StoreSubCategoriaRequest $request)
    {
        // dd($request);
        Subcategoria::create([
            "nombre"=>$request->nombre,
            "categoria_id"=>$request->categoria_id
        ]);
        return back();
    }

    
    public function show(Subcategoria $subcategoria)
    {
        //
    }

 
    public function edit(Subcategoria $subcategoria)
    {
        //
    }


    public function update(Request $request)
    {
       $subcategoria = Subcategoria::find($request->subcategoria_id);
       $subcategoria->update([
           "nombre"=>$request->nombre,
           "categoria_id"=>$request->categoria_id
       ]);
       return back();
    }

    public function destroy($id)
    {
        Subcategoria::destroy($id);
    }
}
