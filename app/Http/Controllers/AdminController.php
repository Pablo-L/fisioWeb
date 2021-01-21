<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;



class AdminController extends Controller
{
	public function isAdmin()
	{
		if(Auth::check() && Auth::user()->rol == "admin")
		{}
		else
			return redirect('/login');
	}
	
	public function show()
	{
		if(Auth::check() && Auth::user()->rol == "admin")
			return view('admin/adminpanel_home');
		else
			return redirect('/login');
	}
	
	public function Resumen()
	{
		if(Auth::check() && Auth::user()->rol == "admin")
		{
			
			$numtrabajadores = \DB::table('trabajadores')->count();
			$numusers = \DB::table('users')->count();
			$numclientes = \DB::table('users')->where('rol', '!=', "admin")->where('rol', '!=', "recepcionista")->where('rol', '!=', "trabajador")->count();
			$numaltasmes = \DB::table('users')->whereMonth('created_at', now()->month)->count();
			$numaltasmes_pasado = \DB::table('users')->whereMonth('created_at', now()->month - 1)->count();
			$numreservasmes = \DB::table('reservas')->whereMonth('dia', now()->month)->count();
			$numreservasmes_pasado = \DB::table('reservas')->whereMonth('dia', now()->month - 1)->count();
			$numtratamientos = \DB::table('tratamientos')->count();
			$nombrescategorias = \DB::table('categorias')->pluck('nombre');
			
			
			
			
			return view('admin/adminpanel_resumen', ['numero_Trabajadores' => $numtrabajadores, 'numero_usuarios' => $numusers, 'numero_clientes' => $numclientes, 'numero_altas_mes' => $numaltasmes, 
			'numero_altas_mespasado' => $numaltasmes_pasado, 'numero_reservas_mes' => $numreservasmes, 'numero_reservas_mespasado' => $numreservasmes_pasado, 'numtratamientos' => $numtratamientos,
			'nombrescategorias' => $nombrescategorias]);
		}
		else
			return redirect('/login');
	}
	
    public function obtenerdatosTratamientos()
    {	
		self::isAdmin();
        
		$tratamientos = \DB::table('tratamientos')->get();
		
		$categorias = \DB::table('categorias')->get();
			
		return view('admin/adminpanel_tratamientos', ['tratamientos' => $tratamientos, 'categorias' => $categorias]);
	}    
	
	public function obtenerdatosTrabajadores()
    {	
		self::isAdmin();
        
		$trabajadores = \DB::table('trabajadores')->get();
			
			
		return view('admin/adminpanel_trabajadores', ['trabajadores' => $trabajadores]);
	}	
	
	public function obtenerCitas()
    {	
		self::isAdmin();
        
		$citas = \DB::table('reservas')->get();
			
			
		return view('admin/adminpanel_citas', ['citas' => $citas]);
	}	
	
	public function obtenerUsuarios()
    {	
		self::isAdmin();
        
		$users = \DB::table('users')->get();
			
			
		return view('admin/adminpanel_usuarios', ['users' => $users]);
	}
}
