<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TrabajadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('trabajadores')->delete();
		$trabajadores = \App\Models\Trabajadores::factory()->count(10)->create();
	
		foreach($trabajadores as $trabajador)
		{
			$user = new User(['nombre' => $trabajador->nombre, 'apellidos' => '', 'email' => $trabajador->email, 'password' => Hash::make($trabajador->dni), 
			'rol' => 'trabajador']);
			$user->save();
		}		
		
    }	
}
