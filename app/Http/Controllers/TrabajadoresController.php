<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajadores;
use App\Models\User;
use Hash;

class TrabajadoresController extends Controller
{
    public function obtenerListadoTrabajadores()
    {	
        $trabajadores = \DB::table('trabajadores')->get();
        return view('/Profesionales', ['trabajadores' => $trabajadores]);
    }

	//función que dado un dni retorna el nombre del trabajador
	public function obtenerNombre($dni)
    {	
		$nombre = \DB::table('trabajadores')->where('DNI', $dni)->value('nombre');
        return $nombre;
	}
	
	//función que dado un dni retorna el nombre del trabajador
	public function obtenerDNI($id)
    {	
		$dni = \DB::table('trabajadores')->where('id', $id)->value('DNI');
        return $dni;
    }

	public function delete(Request $request)
	{
		
		$idTrabajador = $request->input('idTrabajador');
		$trabajadoremail = $request->input('emailTrabajador');
		
		
		$t = Trabajadores::findOrFail($idTrabajador);
		
		$t->delete();
		
		User::where('email', $trabajadoremail)->delete();
		
		return redirect()->route('admin_trabajadores')->with('success','Trabajador dado de baja.');
	}
	
	public function update(Request $request)
	{
		$DNI = $request->input('dniTrabajador');
		$nombre = $request->input('nombreTrabajador');
		$edad = $request->input('edadTrabajador');
		$telefono = $request->input('telefonoTrabajador');
		$email = $request->input('emailTrabajador');
		$sexo = $request->input('sexoTrabajador');
		$poblacion = $request->input('poblacionTrabajador');
		$numero_cuenta = $request->input('cuentaTrabajador');
		$idTrabajador = $request->input('idTrabajador');

		$trabajador = Trabajadores::findorFail($idTrabajador);
		
		$u = User::where('email', $trabajador->email)->firstOrFail();

		$u->nombre = $nombre;
		$u->email = $email;
		$u->telefono = $telefono;
		$u->sexo = $sexo;
		
		$u->update();
		
		$trabajador->DNI = $DNI;
		$trabajador->nombre = $nombre;
		$trabajador->edad =$edad;
		$trabajador->telefono = $telefono;
		$trabajador->email = $email;
		$trabajador->sexo = $sexo;
		$trabajador->numero_cuenta = $numero_cuenta;
		
		$trabajador->update();
		
		
		
		
		return redirect()->route('admin_trabajadores')->with('success','Datos del trabajador actualizados con éxito.');
	}
	
	public function create(Request $request)
	{
		
		$DNI = $request->input('dniTrabajador');
		$nombre = $request->input('nombreTrabajador');
		$edad = $request->input('edadTrabajador');
		$telefono = $request->input('telefonoTrabajador');
		$email = $request->input('emailTrabajador');
		$sexo = $request->input('sexoTrabajador');
		$poblacion = $request->input('poblacionTrabajador');
		$numero_cuenta = $request->input('cuentaTrabajador');

		$trabajador = new Trabajadores();
		
		$trabajador->DNI = $DNI;
		$trabajador->nombre = $nombre;
		$trabajador->edad = $edad;
		$trabajador->telefono = $telefono;
		$trabajador->email = $email;
		$trabajador->sexo = $sexo;
		$trabajador->poblacion = '1';
		$trabajador->numero_cuenta = $numero_cuenta;

		
		$trabajador->save();
		
		$u = new User();
		
		$u->nombre = $nombre;
		$u->apellidos = "";
		$u->email = $email;
		$u->telefono = $telefono;
		$u->sexo = $sexo;
		$u->password = Hash::make($DNI);
		$u->rol = "trabajador";
		
		$u->save();
		
		return redirect()->route('admin_trabajadores')->with('success','Trabajador dado de alta con éxito.');
	}
}
