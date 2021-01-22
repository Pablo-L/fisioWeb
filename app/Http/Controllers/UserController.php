<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Direccion;
use App\Models\MetodoPago;
use Auth;
use Hash;

class UserController extends Controller
{
    public function update(Request $request)
	{
		$nombre = $request->input('nameinput');
		$apellidos = $request->input('apellidosinput');
		$email = $request->input('emailinput');
		$nuevacontrasenya = $request->input('newpasswordinput');
		$contrasenya = $request->input('actualpasswordinput');
		$confirmacontrasenya = $request->input('confirmpasswordinput');
		$telefono = $request->input('telefonoinput');
		$sexo = $request->input('sexoinput');

		$u = User::findorFail(Auth::user()->id);
		
		$u->nombre = $nombre;
		$u->apellidos =$apellidos;
		$u->email = $email;
		$u->telefono = $telefono;
		$u->sexo = $sexo;
		
		if($nuevacontrasenya != NULL)
		{
			if($nuevacontrasenya == $confirmacontrasenya)
			{	
				if(Hash::check($contrasenya, Auth::user()->password))
				$u->password = Hash::make($nuevacontrasenya);
				
				else
				return redirect()->route('profile')->with('error','La contraseña actual no es correcta.');
			}
			
			else
				return redirect()->route('profile')->with('error','Las contraseñas no coinciden.');
		}
		
		$u->save();
		
		return redirect()->route('profile')->with('success','Datos cambiados con éxito.');
    }
	
	public function show(Request $request)
	{
		$direcciones = \DB::table('direcciones')
                ->where('user_id', '=', Auth::user()->id)
                ->get();
				
		$metodospago = \DB::table('metodos_pago')
                ->where('user_id', '=', Auth::user()->id)
                ->get();
		
		return view('/perfil/perfil_home', ['direcciones' => $direcciones], ['metodospago' => $metodospago]);
	}
	
	public function eliminarDireccion(Request $request)
	{
		
		$direccion_id = $request->input('idDireccion');
		
		$d = Direccion::findOrFail($direccion_id);
		
		$d->delete();
		
		return redirect()->route('profile')->with('success','Dirección de facturación eliminada.');
	}
	
	public function anadirDireccion(Request $request)
	{
		
		$provincia = $request->input('provincia');
		$ciudad = $request->input('ciudad');
		$direccion = $request->input('direccion');

		$d = new Direccion();
		
		$d->provincia = $provincia;
		$d->ciudad = $ciudad;
		$d->direccion = $direccion;
		$d->user_id = Auth::user()->id;
		
		$d->save();
		
		return redirect()->route('profile')->with('success','Dirección de facturación añadida.');
	}
	public function modificarDireccion(Request $request)
	{
		
		$provincia = $request->input('provincia');
		$ciudad = $request->input('ciudad');
		$direccion = $request->input('direccion');
		$direccion_id = $request->input('idDireccion');

		$d = Direccion::findOrFail($direccion_id);
		
		$d->provincia = $provincia;
		$d->ciudad = $ciudad;
		$d->direccion = $direccion;
		
		$d->update();
		
		return redirect()->route('profile')->with('success','Dirección de facturación modificada.');
	}	
	
	public function eliminarMetodoPago(Request $request)
	{
		
		$metodoPago_id = $request->input('metodoPago_id');
		
		$p = MetodoPago::findOrFail($metodoPago_id);
		
		$p->delete();
		
		return redirect()->route('profile')->with('success','Metodo de pago eliminado.');
	}
	
	public function anadirMetodoPago(Request $request)
	{
		
		$numero_tarjeta = $request->input('numero_tarjeta');
		$nombre_titular = $request->input('nombre_titular');
		$fecha_caducidad = $request->input('fecha_caducidad');

		$p = new MetodoPago();
		
		$p->numero_tarjeta = $numero_tarjeta;
		$p->nombre_titular = $nombre_titular;
		$p->fecha_caducidad = $fecha_caducidad;
		
		$p->user_id = Auth::user()->id;
		
		$p->save();
		
		return redirect()->route('profile')->with('success','Método de pago añadido.');
	}
	public function modificarMetodoPago(Request $request)
	{
		
		$numero_tarjeta = $request->input('numero_tarjeta');
		$nombre_titular = $request->input('nombre_titular');
		$fecha_caducidad = $request->input('fecha_caducidad');
		
		$metodoPago_id = $request->input('metodoPago_id');

		$p = MetodoPago::findOrFail($metodoPago_id);
		
		$p->numero_tarjeta = $numero_tarjeta;
		$p->nombre_titular = $nombre_titular;
		$p->fecha_caducidad = $fecha_caducidad;
		
		$p->update();
		
		return redirect()->route('profile')->with('success','Método de pago modificado.');
	}

		//función que dado un dni retorna el nombre del trabajador
		public function obtenerNombre($id)
		{	
			$nombre = \DB::table('users')->where('id', $id)->value('nombre');
			return $nombre;
		}
	
}
