<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) 
		{
			$table->string('DNI', 9);
			$table->string('nombre', 100);
			$table->integer('edad', 2);
			$table->string('telefono', 25);
			$table->string('email', 100)->nullable();
			$table->string('sexo', 1)->default('F');
			$table->unsignedInteger('poblacion');
			$table->string('numero_cuenta', 24);
            $table->timestamps();
        });
		
		DB::statement('ALTER TABLE trabajadores ADD CONSTRAINT chk_sexo_trabajadores CHECK (sexo in ("H", "M"));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
}
