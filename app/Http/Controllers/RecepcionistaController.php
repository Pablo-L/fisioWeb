<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Dialibre;
use DatePeriod;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use App\Models\Reservas;

class RecepcionistaController extends Controller
{
    public function obtenerClientes(){
    	if(Auth::check() && Auth::user()->rol == "recepcionista"){
    		$usuarios = \DB::table('users')->where('rol', '=', 'user')->get();
    		$trabajadores = \DB::table('trabajadores')->get();
            $diaActual = date("Y-m-d");
            $hoy = new DateTime('NOW');
            $ocurrencias = 60;
            $diasPermitidos = new DatePeriod($hoy, new DateInterval('P1D'), $ocurrencias);
    		return view('recepcionista/recepcionista_reserva', ['users' => $usuarios, 'trabajadores' => $trabajadores, 'diasPermitidos' => $diasPermitidos, 'min' => $diaActual]);
    	}
    	else
    		return redirect('/login');
    }

    public function obtenerLibres(){
    	if(Auth::check() && Auth::user()->rol == "recepcionista"){
            $dias = \DB::table('diaslibres')->orderBy('dia', 'ASC')->get();
            $diaActual = date("Y-m-d");
    		return view('recepcionista/recepcionista_libres', ['dias' => $dias, 'min' => $diaActual]);
    	}
    	else
    		return redirect('/login');
    }

    public function reservar(Request $request){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            //Reservar cita para un cliente
            $reserva = Reservas::create(['hora' => $request->hora, 'dia' => $request->dia, 'trabajador_id' => $request->idTrabajador, 'cliente_id' => $request->idUser]);
            $reserva->save();
            return redirect('/recepcionista_citas')->with('success', true)->with('message','La cita se ha añadido correctamente');
        }
        else
            return redirect('/login');
    }

    public function diaLibre(Request $request){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            //Añadir un nuevo dia libre
            $diaLibre = Dialibre::create(['dia' => $request->dia, 'motivo' => $request->motivo]);
            $diaLibre->save();
            return redirect('recepcionista_libres');
        }
        else
            return redirect('/login');
    }

    public function eliminarDia(Request $request){
        if(Auth::check() && Auth::user()->rol == "recepcionista"){
            $diaEliminar = \DB::table('diaslibres')->where('id', '=', $request->id);
            $diaEliminar->delete();
            return redirect('/recepcionista_libres');
        }
        else
            return redirect('/login');
    }
}
