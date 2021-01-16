<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tratamientos;

class TratamientosController extends Controller
{
    public function obtenerTratamientosFisioterapia()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Fisioterapia')
                ->get();
        return view('static/Fisioterapia', ['tratamientos' => $tratamientos]);
    }    
	
	public function obtenerTratamientosAcupuntura()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Acupuntura')
                ->get();
        return view('static/Acupuntura', ['tratamientos' => $tratamientos]);
    }	
	
	public function obtenerTratamientosOsteopatia()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Osteopatia')
                ->get();
        return view('static/Osteopatia', ['tratamientos' => $tratamientos]);
    }
	
	public function obtenerTratamientosPilates()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Pilates')
                ->get();
        return view('static/Pilates', ['tratamientos' => $tratamientos]);
    }
	
	public function obtenerTratamientosPsicologia()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Psicologia')
                ->get();
        return view('static/Psicologia', ['tratamientos' => $tratamientos]);
    }
}
