<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Direccion;
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

		$u = User::findorFail(Auth::user()->id);
		
		$u->nombre = $nombre;
		$u->apellidos =$apellidos;
		$u->email = $email;
		
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
		
		return view('/perfil/perfil_home', ['direcciones' => $direcciones]);
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
	
	
}
