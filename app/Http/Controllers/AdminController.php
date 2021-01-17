<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function obtenerdatosTratamientos()
    {	
        if(Auth::check() && Auth::user()->rol == "admin")
		{
		$tratamientos = \DB::table('tratamientos')->get();
			
			
		return view('admin/adminpanel_tratamientos', ['tratamientos' => $tratamientos]);
		}

		else
		return redirect('/login');
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
