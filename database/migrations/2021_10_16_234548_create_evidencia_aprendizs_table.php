<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciaAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_aprendizs', function (Blueprint $table) {
            $table->id('idEvidenciaAprendiz');
            $table->foreignId('idEvidenciaFKk')->nullable(false); 
            $table->foreignId('idProyectoFK')->nullable(false);
            $table->foreignId('idAprendizFK')->nullable(false);
            $table->string('evidenciaAprendiz', 200)->nullable(false);
            $table->string('comentario', 150)->nullable(false);
            $table->date('fechaevidencia')->now();
            $table->timestamps();

            $table->foreign('idEvidenciaFKk')->references('idEvidenciaFK')->on('evidencia_fichas');
            $table->foreign('idProyectoFK')->references('idProyecto')->on('proyectos');
            $table->foreign('idAprendizFK')->references('idAprendiz')->on('aprendizs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencia_aprendizs');
    }
}
