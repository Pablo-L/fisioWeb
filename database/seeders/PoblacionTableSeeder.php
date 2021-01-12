<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PoblacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('poblacion')->delete();
		\DB::Table('poblacion')->insert(array(
		array('id'=>1, 'nombre'=> 'Alicante'),
		array('id'=>2, 'nombre'=> 'Elche'),
		array('id'=>3, 'nombre'=> 'Murcia'),
		array('id'=>4, 'nombre'=> 'Alcoy'),
		));
    }
}
