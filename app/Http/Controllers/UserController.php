<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
