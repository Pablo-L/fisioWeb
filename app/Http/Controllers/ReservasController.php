<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Http\Controllers\TrabajadoresController;
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
        $trabajador = new TrabajadoresController();
        $dni = $trabajador->obtenerDNI($request->trabajador_id);
        if(in_array($request->dia, ReservasController::obtenerDiasLibres())){
            //se está intentado pedir una cita en un día no laboral
            return redirect('Reserva/'.$request->trabajador_id)->with('error', 'No puedes reservar una cita en un día libre');
        }else if(!ReservasController::comprobarDiaDisponible($dni,$request->dia)){
            //el trabajador no puede recibir más visitas
            return redirect('Reserva/'.$request->trabajador_id)->with('error', 'Este trabajador ya tiene el cupo de citas completo ese día');
        }else if(!ReservasController::comprobarHoraDisponible($dni,$request->dia,$request->hora)){
            //el trabajador ya tiene una cita a esa hora
            return redirect('Reserva/'.$request->trabajador_id)->with('error','Este trabajador no tiene disponibilidad ese día a esa hora');
        }else{
        
            $reservas = Reservas::create([
                'hora' => $request->hora,
                'dia' => $request->dia,
                'trabajador_id' => $dni,
                'cliente_id' => $request->cliente_id,
                'tratamiento_id' =>$request->tratamiento_id
            ]);
            $reservas->save();

            return redirect()->route('miscitas')->with('success', true)->with('message','La cita se ha añadido correctamente');
        }
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

        return array($diaUno, $diaDos, $diaTres, 
                        $diaCuarto, $diaCinco, $diaSeis, $diaSiete);
    }                             
    //cancelar reserva
}
