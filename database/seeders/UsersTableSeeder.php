<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('users')->delete();
		
        $user = new User(['nombre' => 'Admin', 'apellidos' => 'Administrador', 'email' => 'fisioweb@admin.com', 'password' => Hash::make('testtest'), 
		'rol' => 'admin']);
        $user->save();
        $user = new User(['nombre' => 'Recepcionista', 'apellidos' => 'Recepto','email' => 'fisioweb@recepcionista.com', 'password' => Hash::make('testtest'), 
        'rol' => 'recepcionista']);
        $user->save();
    }
}
