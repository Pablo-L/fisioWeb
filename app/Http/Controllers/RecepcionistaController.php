<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    public function obtenerClientes(){
    	if(Auth::check() && Auth::user()->rol == "recepcionista"){
    		$usuarios = \DB::table('users')->where('rol', '=', 'user')->get();
    		$tratamientos = \DB::table('tratamientos')->get();
    		return view('recepcionista/recepcionista_reserva', ['users' => $usuarios, 'tratamientos' => $tratamientos]);
    	}
    	else
    		return redirect('/login');
    }

    public function obtenerLibres(){
    	if(Auth::check() && Auth::user()->rol == "recepcionista"){
    		return view('recepcionista/recepcionista_libres');
    	}
    	else
    		return redirect('/login');
    }

    public function reservar(){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            //Reservar cita para un cliente
        }
    }
}
