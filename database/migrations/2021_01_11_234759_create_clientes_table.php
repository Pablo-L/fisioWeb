<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) 
		{
            $table->increments('id');
			$table->string('nombre', 100);
			$table->string('telefono', 25);
			$table->string('email', 100)->nullable();
			$table->string('sexo', 1)->default('F');
			$table->unsignedInteger('poblacion');
			$table->text('observaciones', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
