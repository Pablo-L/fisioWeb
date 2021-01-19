<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
	{
		$nombre = $request->input('nameinput');
		$email = $request->input('emailinput');
		$nuevacontrasenya = $request->input('newpasswordinput');
		$contrasenya = $request->input('actualpasswordinput');
		$confirmacontrasenya = $request->input('confirmpasswordinput');
		$user_id=Auth::user()->id;

		$u = User::findorFail(Auth::user()->id);
		
		$u->name = $nombre;
		$u->email = $email;
		$u->password = $contrasenya;
		
		$u->save();
		
		return redirect()->route('profile');
    }
}
