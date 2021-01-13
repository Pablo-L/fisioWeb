<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tratamientos;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::Table('tratamientos')->delete();
		
        $tratamiento = new Tratamientos(['categoria' => 'Fisioterapia','nombre' => 'Ecografía Músculo Esquelética', 'descripcion' => 'La ecografía musculoesquelética es una técnica cada vez más importante dentro de la
		práctica clínica del fisioterapeuta, tanto en el diagnóstico de fisioterapia como en el posterior tratamiento. La ecografía cuenta con evidencia científica de alta calidad que avala su uso dentro del proceso de 
		razonamiento clínico, ayudando al fisioterapeuta a entender e interpretar de la mejor manera posible las deficiencias que presenta el paciente.Es una herramienta dinámica, muy eficaz, que los fisioterapeutas de 
		la Clínica Vicente Pascual utilizan dentro del examen físico del paciente permitiéndoles, en tiempo real y de forma comparativa, evaluar de forma objetiva el tejido lesionado, programar adecuadamente el programa 
		de Fisioterapia, al mismo tiempo, valorar en las sucesivas sesiones la evolución con el tratamiento de fisioterapia recibido, mejorando de esta forma la calidad de la atención prestada a nuestros pacientes.', 
		'tarifa' => '40']);
        $tratamiento->save();
    }
}
