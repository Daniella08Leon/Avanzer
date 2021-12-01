<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avances', function (Blueprint $table) {
            $table->id('idAvance');
            $table->foreignId('idEvidenciaAprendizFK')->nullable(false);
            $table->foreignId('idProyectoFK')->nullable(false);
            $table->foreignId('idInstructorFK')->nullable(false);
            $table->date('fechaAvance')->now();
            $table->string('avance', 400)->nullable(false);
            $table->timestamps();
            
            $table->foreign('idEvidenciaAprendizFK')->references('idEvidenciaAprendiz')->on('evidencia_aprendizs');
            $table->foreign('idProyectoFK')->references('idProyecto')->on('proyectos');
            $table->foreign('idInstructorFK')->references('idInstructor')->on('instructors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avances');
    }
}
