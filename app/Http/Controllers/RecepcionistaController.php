<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\DiaLibre;

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
            $dias = \DB::table('diaslibres')->get();
    		return view('recepcionista/recepcionista_libres', ['dias' => $dias]);
    	}
    	else
    		return redirect('/login');
    }

    public function reservar(){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            //Reservar cita para un cliente
        }
        else
            return redirect('/login');
    }

    public function diaLibre($dia, $motivo){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            //Añadir un nuevo dia libre
            //$diaLibre = DiaLibre::create(['dia' => $dia, 'motivo' => $motivo]);
            return true;
        }
        else
            return redirect('/login');
    }
}
