<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Direccion;
use Illuminate\Support\Facades\Hash;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('direcciones')->delete();
		
		$direcciones = new Direccion(['provincia' => 'Alicante', 'ciudad' => 'Alicante', 'direccion' => 'Calle Espinosa n53', 'user_id' => '3']);
        $direcciones->save();
		$direcciones = new Direccion(['provincia' => 'Alicante', 'ciudad' => 'Elche', 'direccion' => 'Calle Aliciente nº10', 'user_id' => '3']);
        $direcciones->save();
    }
}
