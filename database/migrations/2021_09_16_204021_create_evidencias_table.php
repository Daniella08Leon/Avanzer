<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id('idEvidencia');
            $table->string('trimestre', 10)->nullable(false);
            $table->string('nombreEvidencia', 50)->nullable(false);
            $table->string('faseEvidencia', 50)->nullable(false);
            $table->string('evidenciaP', 200)->nullable(false);
            $table->boolean('estadoEvidencia')->nullable(false);
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
        Schema::dropIfExists('evidencias');
    }
}
