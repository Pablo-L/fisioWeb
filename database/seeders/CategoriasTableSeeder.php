<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('categorias')->delete();
		
        $categoria = new Categorias(['nombre' => 'Fisioterapia']);
        $categoria->save();	
		
		$categoria = new Categorias(['nombre' => 'Acupuntura']);
        $categoria->save();	
		
		$categoria = new Categorias(['nombre' => 'Osteopatía']);
        $categoria->save();	
    }
}
