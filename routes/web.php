<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\ProcedimientoController;
use App\Http\Controllers\CitaController;

Auth::routes();

//=================== RUTAS PÚBLICAS =======================//
Route::get('/', [HomeController::class, 'index'])->name('home');




//=================== RUTAS DEL CLIENTE =================== //
Route::group([ 'middleware' => 'cliente'], function()
{


});


//==================== RUTAS DEL ADMINISTRADOR =====================
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('paciente',PacienteController::class);
    Route::resource('tratamiento',TratamientoController::class);
    Route::resource('procedimiento',ProcedimientoController::class);
    Route::resource('cita',CitaController::class);
    

    // Route::get('/deuda/abonos/{cliente_id}',[AbonoController::class,'abonosByCliente'])->name('abono.abonosByCliente');
    // Route::post('/venta/guardarVenta',[VentaController::class,'guardarVenta'])->name('venta.guardarVenta');

});
Route::get('cita/validarhorario',[CitaController::class,'validarHorario'])->name('cita.validarHorario');
