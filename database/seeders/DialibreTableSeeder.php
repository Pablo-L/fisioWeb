<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dialibre;

class DialibreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('diaslibres')->delete();

        $dia = new Dialibre(['dia' => '2021-12-25', 'motivo' => 'Dia de navidad']);
        $dia->save();
    }
}
