<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id('idFicha');
            $table->foreignId('idProgramaFK')->nullable(false);
            $table->foreignId('idInstructorFK')->nullable(false);
            $table->string('ficha', 50)->nullable(false);
            $table->date('fechaInicio')->nullable(false);
            $table->date('fechaFin')->nullable(false);
            $table->boolean('estadoFicha')->nullable(false);
            $table->timestamps();
            
            $table->foreign('idProgramaFK')->references('idPrograma')->on('programas');
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
        Schema::dropIfExists('fichas');
    }
}
