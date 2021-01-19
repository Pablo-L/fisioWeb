<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\ReservasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {return view('Inicio');})->name('inicio');
Route::get('/Inicio', function () {return view('Inicio');});
Route::get('/Profesionales', [TrabajadoresController::class, 'obtenerListadoTrabajadores']);
Route::get('/Tarifas', function () {return view('Tarifas');});

Route::get('/Reserva/{idt}/{idc}', [ReservasController::class, 'realizarReservaForm'])->middleware(['auth'])->name('reserva');
Route::get('/Reservas/trabajador/{id}', [ReservasController::class, 'obtenerListadoCitasTrabajador'])->middleware(['auth']);
Route::get('/Reservas/cliente/{id}', [ReservasController::class, 'obtenerListadoCitasCliente'])->middleware(['auth']);
Route::get('admin/Reserva/{hora}/{dia}/{id}', [ReservasController::class, 'realizarReservaTiempo'])->middleware(['auth']);
Route::get('/Reserva/cliente/{hora}/{dia}/{idT}/{idC}', [ReservasController::class, 'realizarReservaCita'])->middleware(['auth']);
Route::get('/Reserva/trabajador/{id}/{dia}', [ReservasController::class, 'comprobarDiaDisponible'])->middleware(['auth']);
Route::get('/Reserva/trabajador/{id}/{dia}/{hora}', [ReservasController::class, 'comprobarHoraDisponible'])->middleware(['auth']);
Route::post('/reservar', [ReservasController::class, 'realizarReservaCita'])->middleware(['auth'])->name('reservar');
Route::get('/reservaConfirmacion', function() {return view('static/reservaConfirmacion');});

// Tratamientos - Informacion estatica
Route::get('/Fisioterapia', [TratamientosController::class, 'obtenerTratamientosFisioterapia']);
Route::get('/Acupuntura', [TratamientosController::class, 'obtenerTratamientosAcupuntura']);
Route::get('/Osteopatia', [TratamientosController::class, 'obtenerTratamientosOsteopatia']);
Route::get('/AvisoLegal', function() {return view('static/AvisoLegal');});
Route::get('/Politicas', function() {return view('static/Politicas');});
Route::get('/TerminosyCondiciones', function() {return view('static/TerminosyCondiciones');});


Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
