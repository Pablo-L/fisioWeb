<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
			$table->string('telefono', 25)->nullable();
			$table->string('sexo', 1)->default('M');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('rol')->default('user');;
            $table->rememberToken();
            $table->timestamps();
        });
		
		DB::statement('ALTER TABLE users ADD CONSTRAINT chk_sexo_users CHECK (sexo in ("H", "M"));');
		DB::statement('ALTER TABLE users ADD CONSTRAINT chk_rol_users CHECK (rol in ("user", "admin", "recepcionista", "trabajador"));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
