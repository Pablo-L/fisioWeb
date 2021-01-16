<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clientes')->delete();
		\App\Models\Clientes::factory()->count(100)->create(); 
    }
}
