<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;



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
        
		$users = \DB::table('users')->where('rol', '!=', 'admin')->get();
			
			
		return view('admin/adminpanel_usuarios', ['users' => $users]);
	}
	
	public function updateUser(Request $request)
	{
		$id = $request->input('idUser');
		$nombre = $request->input('nombreUser');
		$apellidos = $request->input('apellidosUser');
		$email = $request->input('emailUser');
		$telefono = $request->input('telefonoUser');
		$sexo = $request->input('sexoUser');
		$rol = $request->input('rolUser');

		$u = User::findorFail($id);
		
		$u->nombre = $nombre;
		$u->apellidos =$apellidos;
		$u->email = $email;
		$u->telefono = $telefono;
		$u->sexo = $sexo;
		$u->rol = $rol;
			
		$u->update();
		
		return redirect()->route('admin_users')->with('success','Datos cambiados con éxito.');
    }
	
	public function createUser(Request $request)
	{
		$id = $request->input('idUser');
		$nombre = $request->input('nombreUser');
		$apellidos = $request->input('apellidosUser');
		$email = $request->input('emailUser');
		$telefono = $request->input('telefonoUser');
		$sexo = $request->input('sexoUser');
		$rol = $request->input('rolUser');
		$password = $request->input('contrasenaUser');

		$u = new User();
		
		$u->nombre = $nombre;
		$u->apellidos =$apellidos;
		$u->email = $email;
		$u->telefono = $telefono;
		$u->sexo = $sexo;
		$u->rol = $rol;
		$u->password = Hash::make($password);
			
		$u->save();
		
		return redirect()->route('admin_users')->with('success','Usuario creado con éxito.');
    }
	
	public function deleteUser(Request $request)
	{
		
		$user_id = $request->input('idUsuario');
		
		$u = User::findOrFail($user_id);
		
		$u->delete();
		
		return redirect()->route('admin_users')->with('success','Usuario eliminado.');
	}
}
