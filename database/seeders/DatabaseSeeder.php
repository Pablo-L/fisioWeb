<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		\DB::Table('clientes')->delete();
		\DB::Table('poblacion')->delete();
		\DB::Table('tratamientos')->delete();
<<<<<<< HEAD
        \DB::Table('reservas')->delete();

		$this->call(PoblacionTableSeeder::class);
		$this->call(ClientesTableSeeder::class);
		$this->call(TratamientosTableSeeder::class);
        $this->call(TrabajadoresTableSeeder::class);
        $this->call(ReservaTableSeeders::class);
=======
		\DB::Table('trabajadores')->delete();
		\DB::Table('users')->delete();
		
		$this->call(PoblacionTableSeeder::class);
		$this->call(ClientesTableSeeder::class);
		$this->call(TratamientosTableSeeder::class);
		$this->call(TrabajadoresTableSeeder::class);
		$this->call(UsersTableSeeder::class);
>>>>>>> origin/Cristian
        // \App\Models\User::factory(10)->create();
    }
}
