<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsuario')->unique();
            //$table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete('cascade');

            $table->string('ruta')->nullable();
            //$table->foreign('idMultimedia')->references('id')->on('multimedia');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('telefono', 10);
            $table->string('genero', 100)->nullable()->default('Prefiero no decirlo');
            $table->string('info')->nullable();

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
        Schema::dropIfExists('cuentas');
    }
}
