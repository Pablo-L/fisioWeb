<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
class ReservasController extends Controller
{
    //dado un id de cliente y uno de trabajador realiza una reserva
   
    //dado un id de trabajador realiza una reserva de tiempo ocupado
    public function realizarReservaTiempo($hora, $dia, $id_trabajador)
    {	
        $reservas =  Reservas::create([
                                        'hora' => $hora,
                                        'dia' => $dia,
                                        'trabajador_id' => $id_trabajador,
                                      ]);
        return true;
    } 

    //dado un id de trabajador muestra un listado de citas
    public function obtenerListadoCitasTrabajador($id_trabajador)
    {	
        $reservas = \DB::table('reservas')->select('hora','dia','cliente_id')
                                                ->where('trabajador_id',$id_trabajador)->get();
        return view('/Reserva', ['reservas' => $reservas]);
    } 
    //dado un id de cliente muestra el listado de citas del cliente
    public function obtenerListadoCitasCliente($cliente_id)
    {	
        $reservas = \DB::table('reservas')->select('hora','dia','trabajador_id')
                                                ->where('cliente_id',$cliente_id)->get();
        return view('/Reserva', ['reservas' => $reservas]);
    }
    //dado un id de trabajador y una fecha devuelve un bool que determina si el día esta libre o no

    //dado un id de trabajador y una fecha y una hora devuelve un bool que determina si esa hora esta disponible o no

}
