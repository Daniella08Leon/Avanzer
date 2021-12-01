<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizs', function (Blueprint $table) {
            $table->id('idAprendiz');
            $table->foreignId('idUsuarioFK')->unique()->nullable(false);
            $table->foreignId('idFichaFK')->nullable(true);
            $table->string('nombreAprendiz', 50)->nullable(false);
            $table->string('apellidoAprendiz', 50)->nullable(false);
            $table->string('documentoAprendiz', 20)->unique()->nullable(false);
            $table->timestamps();
             
            $table->foreign('idUsuarioFK')->references('idUsuario')->on('users');
            $table->foreign('idFichaFK')->references('idFicha')->on('fichas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendizs');
    }
}
