<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprendizProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendiz_proyectos', function (Blueprint $table) {
            $table->id('idAprendiz_proyectos');
            $table->foreignId('idAprendizFK')->nullable(false);
            $table->foreignId('idProyectoFK')->nullable(false);
            $table->timestamps();

            $table->foreign('idAprendizFK')->references('idAprendiz')->on('aprendizs');
            $table->foreign('idProyectoFK')->references('idProyecto')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendiz_proyectos');
    }
}
