<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function buscarProducto(Request $request)
    {
        $nombre = $request->get('nombre');
        $productos = Producto::where('nombre','like','%'.$nombre.'%')->paginate(10);
        return view('web.tienda',compact('productos'));
    }

    public function verArticulosByCategoria($categoria_id)
    {
        $productos = Producto::where('categoria_id',$categoria_id)->paginate(10);
        return view('web.tienda',compact('productos'));
    }

    public function verArticulosBySubcategoria($subcategoria_id)
    {
        $productos = Producto::where('subcategoria_id',$subcategoria_id)->paginate(10);
        return view('web.tienda',compact('productos'));
    }

   
    public function index()
    {
        $categorias = Categoria::all();
        // dd($categorias[1]->productos);
        // foreach($categorias[1]->productos as $pro)
        // {
            
        //     dd($pro->deleted_at);
        // }

            
        $productos = Producto::paginate(10);
        
        $muebles = Producto::where('categoria_id','2')->get();
        $ofertasTemporales = collect();
       

        foreach($productos as $producto)
        {
           
            if(isset($producto->productoprecio))//existe o existio un descuento
            {
                if($producto->productoprecio->fin_descuento>Carbon::now())
                $ofertasTemporales->push($producto);
            }
        }
        
        // dd($muebles[0]->images->url);
        return view('web.index',compact('muebles','categorias','productos','ofertasTemporales'));
    }

    public function tienda()
    {
        return view('web.tienda');
    }

    public function detalleProducto($id)
    {
        $producto = Producto::find($id);
        return view('web.detalleProducto',compact('producto'));
    }

    public function nosotros()
    {
        return view('web.nosotros');
    }

    public function contactanos()
    {
        return view('web.contactanos');
    }
}
