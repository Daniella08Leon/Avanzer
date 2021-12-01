<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciaFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_fichas', function (Blueprint $table) {
            $table->id('idEvidencia_ficha');
            $table->foreignId('idFichaFK')->nullable(false);
            $table->foreignId('idEvidenciaFK')->nullable(false);
            $table->boolean('estadoEvidenciaFi')->nullable(false)->default(0);
            $table->date('fechaInicio')->nullable(false);
            $table->date('fechaFin')->nullable(false);
            $table->timestamps();

            $table->foreign('idFichaFK')->references('idFicha')->on('fichas');
            $table->foreign('idEvidenciaFK')->references('idEvidencia')->on('evidencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencia_fichas');
    }
}
