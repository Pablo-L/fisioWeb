<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamientos;

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
}
