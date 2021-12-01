<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id('idInstructor');
            $table->foreignId('idUsuarioFK')->unique()->nullable(false);
            $table->string('nombreInstructor', 50)->nullable(false);
            $table->string('apellidoInstructor', 50)->nullable(false);
            $table->string('documentoInstructor', 20)->unique()->nullable(false);
            $table->timestamps();
            
            $table->foreign('idUsuarioFK')->references('idUsuario')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors');
    }
}
