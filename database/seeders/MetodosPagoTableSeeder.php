<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\MetodoPago;

class MetodosPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('metodos_pago')->delete();
		
		$metodo_pago = new MetodoPago(['numero_tarjeta' => '4103052913932298', 'nombre_titular' => 'Ryleigh Clark', 'fecha_caducidad' => '2021/02/02', 'user_id' => '3']);
        $metodo_pago->save();
		$metodo_pago = new MetodoPago(['numero_tarjeta' => '4405640426784886', 'nombre_titular' => 'Ethen Moore', 'fecha_caducidad' => '2021/02/02', 'user_id' => '3']);
        $metodo_pago->save();
    }
}
