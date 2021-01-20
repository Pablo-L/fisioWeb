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
		\DB::Table('poblacion')->delete();
		\DB::Table('tratamientos')->delete();
        \DB::Table('reservas')->delete();

		$this->call(PoblacionTableSeeder::class);
		$this->call(ClientesTableSeeder::class);
		$this->call(TratamientosTableSeeder::class);
        $this->call(TrabajadoresTableSeeder::class);
        $this->call(ReservaTableSeeders::class);
		\DB::Table('trabajadores')->delete();
		\DB::Table('users')->delete();
        \DB::Table('direcciones')->delete();
        \DB::Table('metodos_pago')->delete();


		$this->call(PoblacionTableSeeder::class);
		$this->call(TratamientosTableSeeder::class);
		$this->call(TrabajadoresTableSeeder::class);
		$this->call(UsersTableSeeder::class);
        $this->call(ReservaTableSeeders::class);
        $this->call(DireccionesTableSeeder::class);
        $this->call(MetodosPagoTableSeeder::class);
        

    }
}
