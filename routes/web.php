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
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\MedicoController;

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
    Route::resource('administrador',AdminController::class);
    Route::resource('odontograma',OdontogramaController::class);
    Route::resource('medico',MedicoController::class);
    //Seguimiento pacientes
    Route::get('/seguimiento',[SeguimientoController::class,'index'])->name('seguimiento.index');
    Route::get('/seguimiento/paciente/{id}',[SeguimientoController::class,'datosByPaciente'])->name('seguimiento.datosByPaciente');
    
    Route::get('/calendario',[AdminController::class,'calendario'])->name('admin.calendario');
   
    // Route::get('/deuda/abonos/{cliente_id}',[AbonoController::class,'abonosByCliente'])->name('abono.abonosByCliente');
    // Route::post('/venta/guardarVenta',[VentaController::class,'guardarVenta'])->name('venta.guardarVenta');

    //NOTIFICACIONES
    Route::get('marcar_una_leida/{notificacion_id}/{orden_id}',[CitaController::class,'marcar_una_leida'])->name('marcar_una_leida');

    //REDIRECCION NOTIFICACIONES LEIDAS
    Route::get('/datos-cita/{id}',[CitaController::class, 'show'])->name('cita.showOrden');
    //LEER TODAS LAS NOTIFICACIONES
    Route::get('/notificaciones',[CitaController::class, 'verNotificaciones'])->name('cita.showNotificaciones');
    //ELIMINAR NOTIFICACION
    Route::delete('/eliminar-notificacion/{id}',[CitaController::class, 'eliminarNotificacion'])->name('cita.eliminarNotificacion');



});


Route::get('cita/validarhorario',[CitaController::class,'validarHorario'])->name('cita.validarHorario');
Route::get('tratamiento/editarTratamiento',[TratamientoController::class,'editarTratamiento'])->name('tratamiento.editar');
Route::get('tratamiento/buscar',[TratamientoController::class,'buscarPaciente'])->name('tratamiento.buscarPaciente');
Route::get('odontograma/actualizar',[OdontogramaController::class,'actualizarOdontograma'])->name('odontograma.actualizar');
