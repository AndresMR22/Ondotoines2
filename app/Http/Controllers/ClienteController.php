<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Imagen;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function cuenta()
    {
        return view('cliente.cuenta');
    }

    public function index()
    {
        $clientes = Cliente::all();
       return view('admin.cliente.index',compact('clientes'));
    }

    public function ordenarProductosTienda(Request $request)
    {
        switch($request->get('orden')){
            case('1'): //A-Z
                $productos = Producto::orderBy('nombre','asc')->paginate(5);
            break;
            case('2'): //Z-A
                $productos = Producto::orderBy('nombre','desc')->paginate(5);
            break;
            default: //
            return back();
        }

        
        // $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        // ->groupBy('categoria_id')->get();
        return view('web.tienda', compact('productos'));
    }
 


    public function create()
    {
        return view('admin.cliente.create');
    }

    public function eliminarImagen($id)
    {
        $imagen = Imagen::destroy($id);
        return back();
    }

    public function comentarArticulo(Request $request, Producto $producto){
        // dd($request,$producto);
        if(isset($request->rate)){
            $rating =  $producto->rate($request['rate'], $request['comentario']);
            return back()->with('mensaje','Comentario agregado al articulo.');
        }else{
            $rating =  $producto->rate(0, $request['comentario']);
            return back()->with('mensaje','Comentario agregado al articulo.');
;        }

        

    }

  
    public function store(StoreClienteRequest $request)
    {
        $user = User::create([
            "name"=>$request->nombre_completo,
            "email"=>$request->email,
            "password"=>$request->cedula
        ]);
        // notificar las credenciales de la cuenta al usuario mediante el correo
       $user->cliente()->create([
        "nombre_completo"=>$request->nombre_completo,
        "cedula"=>$request->cedula,
        "telefono"=>$request->telefono,
        "ciudad"=>$request->ciudad,
        "canton"=>$request->canton,
        "direccion"=>$request->direccion,
        "lugar_trabajo"=>$request->lugar_trabajo,
        "cargo"=>$request->cargo,
       ]);
       return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        // dd($request,$id);
        $cliente = Cliente::find($id);
        $cliente->update([
            "nombre_completo"=>$request->nombre_completo,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "ciudad"=>$request->ciudad,
            "canton"=>$request->canton,
            "direccion"=>$request->direccion,
            "lugar_trabajo"=>$request->lugar_trabajo,
            "cargo"=>$request->cargo,
        ]);
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
        Cliente::destroy($id);
        return back();
    }
}
