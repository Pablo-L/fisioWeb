<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) 
		{
            $table->increments('id');
			$table->string('categoria', 100);
			$table->string('nombre', 100);
			$table->string('descripcion', 1000);
			$table->integer('tarifa');
			
			$table->foreign('categoria')->references('nombre')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
        });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
