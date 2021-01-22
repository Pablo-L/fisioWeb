<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservaTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('reservas')->delete();
		\DB::Table('reservas')->insert(array(
		array('id'=>1, 'hora'=> '10:00','dia' => '2021/02/02', 'trabajador_id' => '1', 'cliente_id' => '1', 'tratamiento_id' => '1'),
        array('id'=>2, 'hora'=> '11:00','dia' => '2021/02/02', 'trabajador_id' => '1', 'cliente_id' => '1', 'tratamiento_id' => '2'),
        array('id'=>3, 'hora'=> '12:00','dia' => '2021/02/02', 'trabajador_id' => '1', 'cliente_id' => '1', 'tratamiento_id' => '3'),
		));
    }
}
