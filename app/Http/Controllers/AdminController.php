<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservas;
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
		self::isAdmin();
		
		
		return view('admin/adminpanel_home');
	}
	
	public function Resumen()
	{
		self::isAdmin();
			
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
        
		$diaActual = date("Y-m-d");
		$citas = \DB::table('reservas')->get();
		$users = $users = \DB::table('users')->where('rol', '=', 'user')->get();;
		$tratamientos = \DB::table('tratamientos')->get();
		$trabajadores = \DB::table('trabajadores')->get();
			
			
		return view('admin/adminpanel_citas', ['citas' => $citas, 'users' => $users, 'tratamientos' => $tratamientos, 'min' => $diaActual, 'trabajadores' => $trabajadores]);
	}	
	
	public function obtenerUsuarios()
    {	
		self::isAdmin();
        
		$users = \DB::table('users')->where('rol', '!=', 'admin')->get();
			
			
		return view('admin/adminpanel_usuarios', ['users' => $users]);
	}
	
	public function updateUser(Request $request)
	{
		self::isAdmin();
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
		self::isAdmin();
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
	
	 public function crearCitas(Request $request)
	 {
        self::isAdmin();
            
            $reserva = Reservas::create(['hora' => $request->hora, 'dia' => $request->dia, 'trabajador_id' => $request->idTrabajador, 'cliente_id' => $request->idUser, 'tratamiento_id' => $request->idTratamiento]);
            $reserva->save();
			
			return redirect()->route('admin_citas')->with('success','La cita se ha creado con éxito.');

    }
	
		public function deleteCita(Request $request)
	{
		
		$cita_id = $request->input('idCita');
		
		$r = Reservas::findOrFail($cita_id);
		
		$r->delete();
		
		return redirect()->route('admin_citas')->with('success','Cita eliminada.');
	}
}
