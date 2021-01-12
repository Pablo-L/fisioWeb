<?php

namespace Database\Factories;

use App\Models\Clientes;
use App\Models\Poblacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

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
            'nombre' => $this->faker->name,
			'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
			'sexo' => $sexo,
			'poblacion' => $pobl,
            'observaciones' => $this->faker->text
        ];
    }
}
