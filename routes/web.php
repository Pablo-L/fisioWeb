<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('Inicio');});
Route::get('/Inicio', function () {return view('Inicio');});
Route::get('/Profesionales', function () {return view('Profesionales');});
Route::get('/Tarifas', function () {return view('Tarifas');});
Route::get('/Reserva', function () {return view('Reserva');});



// Tratamientos - Informacion estatica
Route::get('/Fisioterapia', function() {return view('static/Fisioterapia');});
Route::get('/Acupuntura', function() {return view('static/Acupuntura');});
Route::get('/Osteopatia', function() {return view('static/Osteopatia');});
Route::get('/Psicologia', function() {return view('static/Psicologia');});
Route::get('/Pilates', function() {return view('static/Pilates');});
Route::get('/AvisoLegal', function() {return view('static/AvisoLegal');});
Route::get('/Politicas', function() {return view('static/Politicas');});
Route::get('/TerminosyCondiciones', function() {return view('static/TerminosyCondiciones');});
