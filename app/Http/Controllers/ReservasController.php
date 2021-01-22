<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use Auth;

class ReservasController extends Controller
{
    public function realizarReservaForm($trabajador_id){
        $tratamientos = \DB::table('tratamientos')->get();
        return view('/ReservarForm', ['trabajador_id' => $trabajador_id, 'tratamientos' => $tratamientos]);
    } 
    //dado un id de cliente y uno de trabajador realiza una reserva
    public function realizarReservaCita(Request $request)
    {
        $reservas = Reservas::create([
            'hora' => $request->hora,
            'dia' => $request->dia,
            'trabajador_id' => $request->trabajador_id,
            'cliente_id' => $request->cliente_id,
            'tratamiento_id' =>$request->tratamiento_id
        ]);
        $reservas->save();

        $reservas = \DB::table('reservas')->join('tratamientos', 'reservas.tratamiento_id', '=', 'tratamientos.id')->select('hora','dia','trabajador_id', 'tratamientos.nombre', 'tratamientos.tarifa', 'cliente_id')
            ->where('cliente_id',Auth::user()->id)->where('dia','>=',now()->toDateString())
            ->orderBy('dia', 'ASC')->orderBy('hora', 'ASC')->get();
        return view('perfil/perfil_citas', ['reservas' => $reservas])->with('success', true)->with('message','La cita se ha añadido correctamente');
    }
    
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
    public function obtenerListadoCitasCliente()
    {	
        $reservas = \DB::table('reservas')->join('tratamientos', 'reservas.tratamiento_id', '=', 'tratamientos.id')->select('hora','dia','trabajador_id', 'tratamientos.nombre', 'tratamientos.tarifa', 'cliente_id')
            ->where('cliente_id',Auth::user()->id)->where('dia','>=',now()->toDateString())
                ->orderBy('dia', 'ASC')->orderBy('hora', 'ASC')->get();
        return view('perfil/perfil_citas', ['reservas' => $reservas]);
    }
    //dado un id de trabajador y una fecha devuelve un 'bool' que determina si el día esta libre o no
    public function comprobarDiaDisponible($trabajador_id, $dia)
    {	
        $disponible = \DB::table('reservas')->where('trabajador_id', $trabajador_id)
                                                ->where('dia', $dia)->count();

        if($disponible < 8)       {
            return 1;
        }else{
            return 0;
        }       
    }
    //dado un id de trabajador y una fecha y una hora devuelve un bool que determina si esa hora esta disponible o no
    public function comprobarHoraDisponible($trabajador_id, $dia, $hora)
    {	
        $disponible = \DB::table('reservas')->where('trabajador_id', $trabajador_id)
                                                ->where('dia', $dia)
                                                ->where('hora', $hora)->count();

        if($disponible != NULL || $disponible > 0)       {
            return 0;
        }else{
            return 1;
        }       
    }

    //obtiene los días libres de la próxima semana
    public function obtenerDiasLibres(){
        $diasLibres = \DB::table('diaslibres')->where('dia', '>=',now()->toDateString())
                                                ->where('dia', '<=', now()->addDays(7)->toDateString());
        return (array) $diasLibres;
    }   

    //obtiene siete días a partir de la fecha actual
    public function obtenerDiasSemana(){
        $diaUno = now()->toDateString();
        $diaDos = now()->addDays(1)->toDateString();
        $diaTres= now()->addDays(2)->toDateString();
        $diaCuarto = now()->addDays(3)->toDateString();
        $diaCinco = now()->addDays(4)->toDateString();
        $diaSeis = now()->addDays(5)->toDateString();
        $diaSiete = now()->addDays(6)->toDateString();

        return array($diaUno, $diaDos, $diaDos, $diaTres, 
                        $diaCuarto, $diaCinco, $diaSeis, $diaSiete);
    }                             
    //cancelar reserva
}
