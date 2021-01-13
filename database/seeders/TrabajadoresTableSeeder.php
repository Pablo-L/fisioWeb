<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
		\App\Models\Trabajadores::factory()->count(10)->create(); 
    }
}
