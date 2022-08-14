<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ShoppingCartDetailController;

Auth::routes();

//=================== RUTAS PÚBLICAS =======================//
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tienda',[HomeController::class,'tienda'])->name('home.tienda');
Route::get('/producto/detalle/{id}',[HomeController::class, 'detalleProducto'])->name('home.detalleProducto');
Route::get('/nosotros',[HomeController::class,'nosotros'])->name('home.nosotros');
Route::get('/contactanos',[HomeController::class,'contactanos'])->name('home.contactanos');
Route::get('/ordenarproductos',[ClienteController::class,'ordenarProductosTienda'])->name('home.ordenarProductosTienda');
Route::get('/ver/articulos/{categoria_id}',[HomeController::class,'verArticulosByCategoria'])->name('home.articulosByCategoria');
Route::get('/articulos/{subcategoria_id}',[HomeController::class,'verArticulosBySubcategoria'])->name('home.articulosBySubcategoria');
Route::get('/buscarproducto',[HomeController::class,'buscarProducto'])->name('home.buscarProducto');


//====================== RUTAS DEL CARRITO DE COMPRA =============== //
Route::post('/actualizar-carrito',[ShoppingCartController::class,'actualizar'])->name('shoppingcart.actualizar');
Route::resource('shopping_cart_detail',ShoppingCartDetailController::class)->only(['update','store'])->names('shopping_cart_details');
Route::get('/producto-carrito/retirar/{scd}',[ShoppingCartDetailController::class,'retirar'])->name('shoppingCartDetail.retirar');
Route::get('/carrito',[ShoppingCartController::class,'carrito'])->name('shoppingCart.carrito');


//=================== RUTAS DEL CLIENTE =================== //
Route::group([ 'middleware' => 'cliente'], function()
{
Route::get('/cuenta',[ClienteController::class, 'cuenta'])->name('cliente.cuenta');
Route::get('/producto/imagen/eliminar/{id}',[ClienteController::class,'eliminarImagen'])->name('cliente.retirarImagen');
Route::post('/comentar/{producto}',[ClienteController::class,'comentarArticulo'])->name('cliente.comentarArticulo');

});


//==================== RUTAS DEL ADMINISTRADOR =====================
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('producto',ProductoController::class);
    Route::resource('categoria',CategoriaController::class);
    Route::resource('subcategoria',SubcategoriaController::class);
    Route::resource('cliente',ClienteController::class);
    Route::resource('deuda',DeudaController::class);
    Route::resource('abono',AbonoController::class);
    Route::get('/deuda/abonos/{cliente_id}',[AbonoController::class,'abonosByCliente'])->name('abono.abonosByCliente');
    Route::get('/asignar-deuda/{cliente_id}',[DeudaController::class,'asignarDeuda'])->name('deuda.asignarDeuda');
    // Route::resource('venta',VentaController::class);
    Route::get('/ventas/contado',[VentaController::class,'ventasContado'])->name('venta.ventasContado');
    Route::get('/ventas/credito',[VentaController::class,'ventasCredito'])->name('venta.ventasCredito');
    Route::get('/ventas/pagadas',[VentaController::class,'ventasPagadas'])->name('venta.ventasPagadas');
    Route::get('/detalle/venta/{venta_id}',[VentaController::class,'detalleVenta'])->name('venta.detalleVenta');
    Route::get('/detalle/venta-pagada/{venta_id}',[VentaController::class,'detalleVentaPagada'])->name('venta.detalleVentaPagada');
    Route::get('/subcategorias/categoria/{categoria_id}',[SubcategoriaController::class,'subcategoriasByCategoria'])->name('subcategoria.subcategoriasByCategoria');
    Route::get('/venta/agregar',[VentaController::class,'formVenta'])->name('venta.formVenta');
    Route::get('/pasarela/pagar',[VentaController::class,'pasarela'])->name('venta.pasarela');
    Route::get('/venta/agregar-cantidad',[VentaController::class,'agregarCantidad'])->name('venta.agregarCantidad');
    Route::post('/venta/guardarVenta',[VentaController::class,'guardarVenta'])->name('venta.guardarVenta');

    Route::get('/pdf/venta-pagada/{venta_id}',[PDFController::class,'pdfVentaPagada'])->name('pdf.ventaPagada');


    //==================== SECCION DE DESCUENTOS ===============//
    Route::get('/agregardescuento',[DescuentoController::class,'create'])->name('descuento.crear');
    Route::post('/agregardescuento',[DescuentoController::class,'store'])->name('descuento.store');
});
