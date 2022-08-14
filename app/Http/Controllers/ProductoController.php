<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Color;
use App\Models\ProductoPrecio;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
  
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('admin.producto.index',compact('productos','categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.producto.create',compact('categorias'));
    }

    
    public function store(StoreProductoRequest $request)
    {
        // dd($request);
        $producto = Producto::create([
            "codigo"=>$request->codigo,
            "cantidad"=>$request->cantidad,
            "nombre"=>$request->nombre,
            "marca"=>$request->marca,
            "descripcion"=>$request->descripcion,
            "modelo"=>$request->modelo,
            "color"=>$request->color,
            // "precio_costo"=>$request->precio_costo,
            // "pvp"=>$request->pvp,
            "subcategoria_id"=>$request->subcategoria_id,
            "categoria_id"=>$request->categoria_id,
        ]);

        foreach($request->color as $key => $color)
        {
           $color = $producto->colores()->create([
                "codigo"=>$color,
                "producto_id"=>$producto->id
            ]);

            $url = '';
            $file = $request->fotos[$key];
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'color_producto']);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();

            $color->imagen()->create([
                "url"=>$url,
                "public_id"=>$public_id
            ]);
        }
     
        ProductoPrecio::create([
            "precio_costo"=>$request->precio_costo,
            "pvp"=>$request->pvp,
            // "descuento"=>$request->descuento,
            // "inicio_descuento"=>'',
            // "fin_descuento"=>'',
            "producto_id"=>$producto->id,
        ]);


        if(request()->hasFile('images')){
            $images = request()->file('images');
           
            foreach($images as $image){
                     $elemento = Cloudinary::upload($image->getRealPath(),['folder'=>'productos']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $producto->images()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);   
            }//fin foreach   
        }
        Toast('¡Producto agregado al sistema!','success');
        return redirect()->route('producto.index');
    }


    public function show(Producto $producto)
    {
        //
    }

  
    public function edit(Producto $producto)
    {
        //
    }

    public function update(Request $request)
    {

        $producto = Producto::find($request->producto_id);
    
        $producto->update([
            "codigo"=>$request->codigo,
            "cantidad"=>$request->cantidad,
            "nombre"=>$request->nombre,
            "marca"=>$request->marca,
            "modelo"=>$request->modelo,
            "descripcion"=>$request->descripcion,
            "color"=>$request->color,
            "precio_costo"=>$request->precio_costo,
            "pvp"=>$request->pvp,
            "categoria_id"=>$request->categoria_id,
        ]);

        if($request->hasFile('images')){
            $imagenes = $request->images;
            foreach($imagenes as $imagen)
            {
                $elemento = Cloudinary::upload($imagen->getRealPath(),['folder'=>'productos']);
                $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();
                 $producto->images()->create([
                    'url'=>$url,
                    'public_id'=>$public_id
                    ]);   
            }
        }
        return back();
    }

  
    public function destroy($id)
    {
        Producto::destroy($id);
        Toast('¡Producto eliminado del sistema!','success');
        return back();
    }
}
