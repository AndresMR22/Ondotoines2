<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\ShoppingCartDetail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreShoppingCartDetailRequest;
use App\Http\Requests\UpdateShoppingCartDetailRequest;

class ShoppingCartDetailController extends Controller
{
    public function store(Request $request)
    {  
        // dd($request);
         $producto = Producto::find($request->get('producto_id'));
        //  dd($producto);
        // if($request->cantidad > $ejercicio->stock){
        //     return back()->with('mensaje2','Al momento no se cuenta con la cantidad de ejercicios especificada.');
        // }
     
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($producto, $request);
        Alert::toast('Producto agregado al carrito','success');
        return back();
    }

    public function retirar(ShoppingCartDetail $scd){
        ShoppingCartDetail::destroy($scd->id);
        Alert::toast('Producto retirado del carrito de compra', 'success');
        return back();
    }

    
    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        // dd($shoppingCartDetail);
        ShoppingCartDetail::destroy($shoppingCartDetail->id);
        Alert::toast('Producto retirado del carrito de compra', 'success');
        return back();
    }  
}
