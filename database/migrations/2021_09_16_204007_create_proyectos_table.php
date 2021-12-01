<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('idProyecto');
            $table->foreignId('idFichaFK')->nullable(false);
            $table->string('nombreProyecto', 50)->nullable(false);
            $table->string('descripcionProyecto', 200)->nullable(false);
            $table->integer('estadoProyecto')->nullable(false);
            $table->timestamps();
             
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
        Schema::dropIfExists('proyectos');
    }
}
