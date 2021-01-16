<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\TrabajadoresController;

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
Route::get('/Reserva', function () {return view('Reserva');})->middleware(['auth'])->name('reserva');



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
