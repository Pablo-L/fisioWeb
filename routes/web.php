<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriasController;

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

Route::get('/Reserva/{idt}', [ReservasController::class, 'realizarReservaForm'])->middleware(['auth'])->name('reserva');;
Route::post('/reservar', [ReservasController::class, 'realizarReservaCita'])->middleware(['auth'])->name('reservar');




Route::get('/Tratamientos/{categoriatratamiento}', [TratamientosController::class, 'obtenerTratamientos'])->name('Tratamientos');
Route::get('/Politicas', function() {return view('Politicas');})->name('infoPoliticas');
Route::get('/SobreNosotros', function() {return view('SobreNosotros');});

//Panel de administracion -- Panel de administracion -- Panel de administracion
Route::get('/adminPanel', [AdminController::class, 'show'])->middleware(['auth'])->name('adminPanel');

Route::get('/adminPanel_resumen', [AdminController::class, 'Resumen'])->middleware(['auth'])->name('admin_resumen');

Route::get('adminPanel_tratamientos', [AdminController::class, 'obtenerdatosTratamientos'])->middleware(['auth'])->name('admin_tratamientos');
Route::post('adminPanel_tratamientos', [TratamientosController::class, 'update'])->middleware(['auth'])->name('admin_tratamientos_update');
Route::post('adminPanel_tratamientos/borrar', [TratamientosController::class, 'delete'])->middleware(['auth'])->name('admin_tratamientos_delete');
Route::post('adminPanel_tratamientos/create', [TratamientosController::class, 'create'])->middleware(['auth'])->name('admin_tratamientos_create');
Route::post('adminPanel_tratamientos/createcategoria', [CategoriasController::class, 'create'])->middleware(['auth'])->name('admin_categoria_create');
Route::post('adminPanel_tratamientos/borrarcategoria', [CategoriasController::class, 'delete'])->middleware(['auth'])->name('admin_categoria_delete');

Route::get('adminPanel_trabajadores', [AdminController::class, 'obtenerdatosTrabajadores'])->middleware(['auth'])->name('admin_trabajadores');
Route::post('adminPanel_trabajadores', [TrabajadoresController::class, 'update'])->middleware(['auth'])->name('admin_trabajadores_update');
Route::post('adminPanel_trabajadores/borrar', [TrabajadoresController::class, 'delete'])->middleware(['auth'])->name('admin_trabajadores_delete');
Route::post('adminPanel_trabajadores/crear', [TrabajadoresController::class, 'create'])->middleware(['auth'])->name('admin_trabajadores_create');

Route::get('adminPanel_citas', [AdminController::class, 'obtenerCitas'])->middleware(['auth'])->name('admin_citas');
Route::post('adminPanel_citas/crear', [AdminController::class, 'crearCitas'])->middleware(['auth'])->name('admin_citas_create');
Route::post('adminPanel_citas/borrar', [AdminController::class, 'deleteCita'])->middleware(['auth'])->name('admin_citas_delete');

Route::get('adminPanel_usuarios', [AdminController::class, 'obtenerUsuarios'])->middleware(['auth'])->name('admin_users');
Route::post('adminPanel_usuarios', [AdminController::class, 'updateUser'])->middleware(['auth'])->name('admin_users_update');
Route::post('adminPanel_usuarios/borrar', [AdminController::class, 'deleteUser'])->middleware(['auth'])->name('admin_users_delete');
Route::post('adminPanel_usuarios/crear', [AdminController::class, 'createUser'])->middleware(['auth'])->name('admin_users_create');


//Panel de administracion -- Panel de administracion -- Panel de administracion

//Perfil de usuario -- Perfil de usuario -- Perfil de usuario

Route::get('/perfil', [UserController::class, 'show'])->middleware(['auth'])->name('profile');

Route::post('/perfil', [UserController::class, 'update'])->middleware(['auth'])->name('profileEditPersonal');

Route::post('/perfil/eliminardireccion', [UserController::class, 'eliminarDireccion'])->middleware(['auth'])->name('profileEliminarDireccion');

Route::post('/perfil/anadirdireccion', [UserController::class, 'anadirDireccion'])->middleware(['auth'])->name('profileAnadirDireccion');

Route::post('/perfil/modificardireccion', [UserController::class, 'modificarDireccion'])->middleware(['auth'])->name('profileModificarDireccion');

Route::post('/perfil/eliminarMetodoPago', [UserController::class, 'eliminarMetodoPago'])->middleware(['auth'])->name('profileliminarMetodoPago');

Route::post('/perfil/anadirMetodoPago', [UserController::class, 'anadirMetodoPago'])->middleware(['auth'])->name('profileanadirMetodoPago');

Route::post('/perfil/modificarMetodoPago', [UserController::class, 'modificarMetodoPago'])->middleware(['auth'])->name('profilemodificarMetodoPago');

Route::get('/perfil/miscitas',  [ReservasController::class, 'obtenerListadoCitasCliente'])->middleware(['auth'])->name('miscitas');


//Panel de recepcionista

Route::get('/recepcionista', function (){
	if(Auth::check() && Auth::user()->rol == "recepcionista")
		return view('recepcionista/home');
	else
		return redirect('/login');
})->middleware(['auth'])->name('recepcionista');

route::get('recepcionista_citas', [RecepcionistaController::class, 'obtenerClientes'])->middleware(['auth'])->name('recepcionista_citas');
route::get('recepcionista_libres', [RecepcionistaController::class, 'obtenerLibres'])->middleware(['auth'])->name('recepcionista_libres');
route::post('recepcionista_reserva', [RecepcionistaController::class, 'reservar'])->middleware(['auth'])->name('recepcionista_reserva');
route::post('recepcionista_diaLibre', [RecepcionistaController::class, 'diaLibre'])->middleware(['auth'])->name('recepcionista_diaLibre');
route::post('recepcionista_eliminarDia', [RecepcionistaController::class, 'eliminarDia'])->middleware(['auth'])->name('recepcionista_eliminarDia');

require __DIR__.'/auth.php';
