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
			return view('admin/adminpanel_resumen');
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
