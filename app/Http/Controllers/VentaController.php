<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Abono;
use App\Models\Deuda;
use App\Models\Venta;
use App\Models\Cuenta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\VentaDetail;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class VentaController extends Controller
{
   
    public function detalleVentaPagada($venta_id)
    {
        $venta = Venta::find($venta_id);
        $cliente = Cliente::find($venta->cliente_id);
        if($venta->tipo==0)//contado
            return view('admin.venta.detalleVentaPagada',compact('venta','cliente'));
        else
        {
            $deuda=Deuda::where('venta_id',$venta->id)->first();
            $abonos = $deuda->abonos()->get();
            $entrada = $abonos[0]->valor;
            return view('admin.venta.detalleVentaPagada',compact('venta','cliente','entrada'));
        }
    }

    public function ventasPagadas()
    {
        $deudas = Deuda::all();
        // dd($deudas);
        $ventasPagadas = collect();
        foreach($deudas as $deuda)
         {
        
            $abonos = $deuda->abonos()->get();
            $sumaAbonos = 0;
            foreach($abonos as $abono)
            {
                $sumaAbonos = $sumaAbonos + $abono->valor;
            }

            //alternativa para cuando la deuda no haya sido vendida despues del sistema
            // agregar campo total_pagar y asignar manualmente el valor a pagar
            //Para este caso la venta fue realizada desde la pagina o por el admin
            $venta = Venta::find($deuda->venta_id);
            if($venta->total+$abonos[0]->valor == $sumaAbonos && ($venta->tipo==1))
                $ventasPagadas->push($venta);
            else
                if($venta->total == $sumaAbonos && ($venta->tipo==0))
                        $ventasPagadas->push($venta);
         }
        return view('admin.venta.ventasPagadas',compact('ventasPagadas'));
    }

    public function detalleVenta($venta_id)
    {
        $venta = Venta::find($venta_id);
        $cliente = Cliente::find($venta->cliente_id);
        return view('admin.venta.detalleVenta',compact('venta','cliente'));
    }

    public function pasarela()
    {
        return view('admin.venta.agregar');
    }

    public function agregarCantidad(Request $request)
    {
        $producto_id = $request->get('producto_id');
        $cantidad = $request->get('cantidad');
        $producto = Producto::find($producto_id);
        $cantidadActual = $producto->cantidad;
        $resto = $cantidadActual - $cantidad;
        if($resto <0){
            return 0;
        }else{
          return 1;
        }
     

    }

    public function guardarVenta(Request $request){
        // dd($request);
        //validacion
        $formaPago = $request->formapago;
        if($formaPago == 1){//CONTADO
            $user =  User::create([
                "name"=>$request->nombres.$request->apellidos,
                "email"=>$request->correo,
                "password"=>$request->cedula
            ]);
            $cliente = $user->cliente()->create([
                "nombre_completo"=>$request->nombres.$request->apellidos,
                "cedula"=>$request->cedula,
                "telefono"=>$request->telefono,
                "ciudad"=>$request->ciudad,
                "canton"=>$request->canton,
                "direccion"=>$request->direccion,
                "cargo"=>$request->cargo,
                "lugar_trabajo"=>$request->lugar_trabajo,
            ]);

            $venta =  Venta::create([
                "cliente_id"=>$cliente->id,
                "total"=>$request->totalreq,
                "descuento"=>$request->descuento,
                //contado == 0 , credito ==1
                "tipo"=>0,
            ]);

            $deuda = Deuda::create([
                "cuota"=>$request->cuota,
                "saldo"=>$request->totalreq,
                "cliente_id"=>$cliente->id,
                "venta_id"=>$venta->id,
                "meses"=>$request->mesesdiferir
            ]);

           $abono = Abono::create([
                "valor"=>$request->abono,
                "deuda_id"=>$deuda->id
            ]);
    
            $shopping_cart = ShoppingCart::get_the_session_shopping_cart();

            foreach($shopping_cart->shopping_cart_details as $scd){
                VentaDetail::create([
                    "cantidad"=>$scd->cantidad,
                    "precio"=>$scd->precio,
                    "producto_id"=>$scd->producto_id,
                    "venta_id"=>$venta->id,
                ]);

                foreach($shopping_cart->shopping_cart_details as $scd){
                     Producto::destroy($scd->producto->id);                   
                }
                $shopping_cart->delete();
                //generar el make_notification_venta
                return back();
            }
        }else{ //CREDITO

           $user =  User::create([
                "name"=>$request->nombres.' '.$request->apellidos,
                "email"=>$request->correo,
                "password"=>$request->cedula
            ]);

            $cliente = $user->cliente()->create([
                "nombre_completo"=>$request->nombres.' '.$request->apellidos,
                "cedula"=>$request->cedula,
                "telefono"=>$request->telefono,
                "ciudad"=>$request->ciudad,
                "canton"=>$request->canton,
                "direccion"=>$request->direccion,
                "cargo"=>$request->cargo,
                "lugar_trabajo"=>$request->lugar_trabajo,
            ]);

          //notificar contraseña al correo del cliente que se ha creado su cuenta
            //la idea es que pueda realizar los pagos mediante la pagina tambien
            $venta =  Venta::create([
                "cliente_id"=>$cliente->id,
                "total"=>$request->totalreq,
                //contado == 0 , credito ==1
                "tipo"=>1,
            ]);
        
            $deuda = Deuda::create([
                "cuota"=>$request->cuotas,
                "saldo"=>$request->totalreq,
                "meses"=>$request->mesesdiferir,
                "venta_id"=>$venta->id,
                "cliente_id"=>$cliente->id,
            ]);

           $abono = Abono::create([
                "valor"=>$request->abono,
                "deuda_id"=>$deuda->id
            ]);

            if ($request->hasFile('imagen')) {
                $url = "";
                $file = $request['imagen'];
                $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'abonos']);
                $public_id = $elemento->getPublicId();
                $url = $elemento->getSecurePath();

                $abono->imagen()->create([
                    "url" => $url,
                    "public_id" => $public_id
                ]);
            }
        
            $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
    
            foreach($shopping_cart->shopping_cart_details as $scd){
                VentaDetail::create([
                    "cantidad"=>$scd->cantidad,
                    "precio"=>$scd->precio,
                    "producto_id"=>$scd->producto_id,
                    "venta_id"=>$venta->id,
                ]);
            }
            //retiramos del inventario los productos que se compraron a credito
            //con withTrash de Laravel podremos recuperar en caso que no se paguen
            foreach($shopping_cart->shopping_cart_details as $scd){
                Producto::destroy($scd->producto->id);                   
           }

           $shopping_cart->delete();


            return back();
        }
    


    }

    public function existeProductoCarrito($producto) 
    {
        $band = false;
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();

        foreach($shopping_cart->shopping_cart_details as $scd){
                if($scd->producto->codigo == $producto->codigo){
                    $band = true; // el producto ya esta agregado en el carrito
                }
        }
        return $band;
    }

    public function formVenta()
    {
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        if(count($shopping_cart->shopping_cart_details)>0)
        {
            
            $productosAll = Producto::all();
            $productosCarrito = $shopping_cart->shopping_cart_details;
            $productos = collect();
            foreach($productosAll as $producto)
            {
                $res = $this->existeProductoCarrito($producto);
                    if($res == false)
                    {
                        $productos->push($producto);
                    }  
            }
           
                $productosRestantes = $productos;
                return view('admin.venta.productos',compact('productosRestantes'));        
    }    else{
            $productosRestantes = Producto::all();
            return view('admin.venta.productos',compact('productosRestantes'));
        }
}

    public function index()
    {
    //   }
    }

    public function ventasContado()
    {
        $ventasContado = Venta::where('tipo',0)->get();
        return view('admin.venta.ventasContado',compact('ventasContado'));
    }

    public function ventasCredito()
    {
        $ventasCredito = Venta::where('tipo',1)->get();
        return view('admin.venta.ventasCredito',compact('ventasCredito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVentaRequest  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
