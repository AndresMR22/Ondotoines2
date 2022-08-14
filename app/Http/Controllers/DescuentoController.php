<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    

    public function create()
    {
        $categorias = Categoria::all();
        $productos = Producto::all();
        $marcas = collect();
        $modelos = collect();
        foreach($productos as $producto)
        {
            $marcas->push($producto->marca);
            $modelos->push($producto->modelo);
        }
        
        
        return view('admin.descuento.create',compact('categorias','marcas','modelos'));
    }

    public function store(Request $request)
    {
        $fecha_fin = Carbon::parse($request->fin_descuento);
        // dd($request,Carbon::now(),$fecha);
        if($request->opcionDescuento=='1')//producto por categoria, subcategoria modelo y marca
        {
           $productos = Producto::where([
            'categoria_id'=>$request->categoria,
            'subcategoria_id'=>$request->subcategoria_id,
            'marca'=>$request->marca,
            'modelo'=>$request->modelo
            ])
           ->get();
           foreach($productos as $key => $producto)
           {
            $producto->productoprecio->update([
                "descuento"=>$request->descuento,
                "inicio_descuento"=>Carbon::now(),
                "fin_descuento"=>$fecha_fin,
            ]);
           }

           return redirect()->route('producto.index');

        }else{//producto por categoria
            $productos = Producto::where([
                'categoria_id'=>$request->categoria,
                'subcategoria_id'=>$request->subcategoria_id,
                // 'marca'=>$request->marca,
                // 'modelo'=>$request->modelo
                ])
               ->get();
               foreach($productos as $key => $producto)
               {
                $producto->productoprecio->update([
                    "descuento"=>$request->descuento,
                    "inicio_descuento"=>Carbon::now(),
                    "fin_descuento"=>$fecha_fin,
                ]);
               }
    
               return redirect()->route('producto.index');
        }

    }
}
