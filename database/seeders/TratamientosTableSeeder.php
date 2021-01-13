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
		razonamiento clínico, ayudando al fisioterapeuta a entender e interpretar de la mejor manera posible las deficiencias que presenta el paciente.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Fisioterapia','nombre' => 'Neuromodulación Percutánea Ecoguiada', 'descripcion' => 'La técnica de neuromodulación percutánea ecoguiada se define como la estimulación 
		eléctrica a través de una aguja con guía ecográfica de un nervio periférico en algún punto de su trayecto o de un músculo en un punto motor con un objetivo terapéutico.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Fisioterapia','nombre' => 'Punción Seca', 'descripcion' => 'La técnica consiste en una punción del músculo (en la banda tensa situada dentro del PGM) con una aguja 
		estéril de punción con el objetivo de destruir la placa motora, estimular el receptor muscular (huso neuromuscular) disminuyendo de forma inmediata el dolor que tiene el paciente y produciendo una relajación muscular 
		refleja con aumento de la elasticidad muscular.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Fisioterapia','nombre' => 'Mesoterapia en el aparato locomotor', 'descripcion' => 'Se trata de una técnica de fisioterapia invasiva indicada en disfunciones del sistema 
		neuromusculoesquelético con el objetivo de estimular la curación natural de forma directa y eficiente, siempre bajo el razonamiento clínico y la práctica adecuada basada en la evidencia, y como complemento a otras 
		estrategias terapéuticas en fisioterapia (terapia manual, electroterapia, ejercicio terapéutico), o combinada con otras técnicas de fisioterapia invasiva.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Osteopatia','nombre' => 'Osteopatía Estructural', 'descripcion' => 'Método orientado al reequilibrio, ajuste y normalización del sistema músculo-esquelético y de la 
		postura. Patologías de miembros y columna vertebral, lesiones deportivas, lesiones traumatológicas, protrusiones y hernias discales.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Osteopatia','nombre' => 'Osteopatía Craneal', 'descripcion' => ' Método orientado al reequilibrio y ajuste del sistema cráneo-sacro y su influencia en el sistema 
		nervioso central. Cefaleas, migrañas, sinusitis, problemas de ATM, ojo y oído, en edad infantil también alteraciones en la forma del cráneo y disfunciones del sistema músculo esquelético (caderas, miembros, pies).', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Osteopatia','nombre' => 'Osteopatía Visceral', 'descripcion' => 'Método orientado al reequilibrio funcional de los diferentes órganos y visceras del cuerpo. 
		Trastornos menstruales (dismenorreas), trastornos digestivos e intestinales (hernias de hiato, gases, estreñimiento, gastritis, aerofagia, colon irritable, problemas de vesícula biliar).', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Acupuntura','nombre' => 'Moxibustión', 'descripcion' => 'La moxibustión consiste en aplicar calor a los puntos de acupuntura. En algunos casos se 
		cauteriza el punto de acupuntura pero en la mayoría de las ocasiones solo se aplica calor. El método de la moxibustión permite activar los receptores térmicos de la piel, y de esta forma provocar 
		estímulos que compiten con los sistemas de modulación del dolor', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Acupuntura','nombre' => 'Electroacupuntura', 'descripcion' => 'Consiste en aplicar corriente eléctrica terapéutica sobre las agujas de acupuntura 
		a través de aparatos de electroestimulación. Ésta puede ser útil para tratar la fibromialgia, el dolor miofascial y el codo de tenista.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		$tratamiento = new Tratamientos(['categoria' => 'Pilates','nombre' => 'Rehabilitación método Pilates', 'descripcion' => 'El método se centra en el desarrollo de los músculos internos para mantener 
		el equilibrio corporal y dar estabilidad y firmeza a la columna vertebral, por lo que es muy usado como terapia en rehabilitación y para, por ejemplo, prevenir y curar el dolor de espalda.', 
		'tarifa' => '40']);
        $tratamiento->save();
		
		
    }
}
