<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\AdminController;

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


Route::redirect('/', '/Inicio');
Route::get('/Inicio', function () {return view('Inicio');})->name('inicio');
Route::get('/Profesionales', [TrabajadoresController::class, 'obtenerListadoTrabajadores'])->name('infoProfesionales');
Route::get('/Tarifas', function () {return view('Tarifas');})->name('infoTarifas');

Route::get('/Reserva/trabajador/{id}', [ReservasController::class, 'obtenerListadoCitasTrabajador']);
Route::get('/Reserva/cliente/{id}', [ReservasController::class, 'obtenerListadoCitasCliente']);
Route::get('admin/Reserva/{hora}/{dia}/{id}', [ReservasController::class, 'realizarReservaTiempo']);
Route::get('/Reserva/cliente/{hora}/{dia}/{idT}/{idC}', [ReservasController::class, 'realizarReservaCita']);
Route::get('/Reserva/trabajador/{id}/{dia}', [ReservasController::class, 'comprobarDiaDisponible']);
Route::get('/Reserva/trabajador/{id}/{dia}/{hora}', [ReservasController::class, 'comprobarHoraDisponible']);


Route::get('/Fisioterapia', [TratamientosController::class, 'obtenerTratamientosFisioterapia'])->name('infoFisioterapia');
Route::get('/Osteopatia', [TratamientosController::class, 'obtenerTratamientosOsteopatia'])->name('infoOsteopatia');
Route::get('/Acupuntura', [TratamientosController::class, 'obtenerTratamientosAcupuntura'])->name('infoAcupuntura');
Route::get('/Politicas', function() {return view('Politicas');})->name('infoPoliticas');


//Panel de administracion -- Panel de administracion -- Panel de administracion
Route::get('/adminPanel', function() 
{
	if(Auth::check() && Auth::user()->rol == "admin")
	return view('admin/adminpanel_home');

	else
	return redirect('/login');
})->middleware(['auth'])->name('adminPanel');

Route::get('adminPanel_tratamientos', [AdminController::class, 'obtenerdatosTratamientos'])->middleware(['auth']);

Route::get('adminPanel_profesionales', function() 
{
	if(Auth::check() && Auth::user()->rol == "admin")
	return view('admin/adminpanel_profesionales');

	else
	return redirect('/login');
})->middleware(['auth']);

Route::get('adminPanel_citas', function() 
{
	if(Auth::check() && Auth::user()->rol == "admin")
	return view('admin/adminpanel_citas');

	else
	return redirect('/login');
})->middleware(['auth']);

Route::get('adminPanel_usuarios', function() 
{
	if(Auth::check() && Auth::user()->rol == "admin")
	return view('admin/adminpanel_usuarios');

	else
	return redirect('/login');
})->middleware(['auth']);


//Panel de administracion -- Panel de administracion -- Panel de administracion

//Perfil de usuario -- Perfil de usuario -- Perfil de usuario

Route::get('/perfil', function () {
    return view('/perfil/perfil_home');
})->middleware(['auth'])->name('profile');

Route::get('/perfil/miscitas', function () 
{
    return view('perfil_citas');
})->middleware(['auth'])->name('miscitas');

require __DIR__.'/auth.php';
