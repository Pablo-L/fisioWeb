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
		$email = $request->input('emailinput');
		$nuevacontrasenya = $request->input('newpasswordinput');
		$contrasenya = $request->input('actualpasswordinput');
		$confirmacontrasenya = $request->input('confirmpasswordinput');

		$u = User::findorFail(Auth::user()->id);
		
		$u->name = $nombre;
		$u->email = $email;
		
		if($nuevacontrasenya != NULL)
		{
			if($nuevacontrasenya == $confirmacontrasenya && (Hash::check($contrasenya, Auth::user()->password)))
			{
				$u->password = Hash::make($nuevacontrasenya);
			}
			
			else
			{
				return redirect()->route('profile')->with('error','Las contraseñas no son correctas o no coinciden.');
			}
		}
		
		$u->save();
		
		return redirect()->route('profile')->with('success','Datos cambiados con éxito.');
    }
}
