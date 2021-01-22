<?php

namespace Database\Factories;

use App\Models\Trabajadores;
use App\Models\Poblacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TrabajadoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trabajadores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

		$sexoAux = $this->faker->boolean(75);
		$sexo = $sexoAux?"H":"M";
		$numPobl = Poblacion::all()->count();
		$pobl = $this->faker->numberBetween(1,$numPobl);
		
        return [
			'dni' => $this->faker->dni,
            'nombre' => $this->faker->name,
			'edad' => $this->faker->numberBetween($min = 20, $max = 60),
			'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
			'sexo' => $sexo,
			'poblacion' => $pobl,
            'numero_cuenta' => $this->faker->iban(null)	
        ];
    }
}
