<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Trabajadores;

class TrabajadoresController extends Controller
{
    public function obtenerListadoTrabajadores()
    {	
        $trabajadores = \DB::table('trabajadores')->get();
        return view('/Profesionales', ['trabajadores' => $trabajadores]);
    }    
}
