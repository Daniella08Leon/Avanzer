<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->foreignId('idRolFK')->nullable(false);
            $table->string('email', 70)->nullable(false);
            $table->timestamp('email_verified_at')->nullable(false);
            $table->string('password', 70)->nullable(false); 
            $table->boolean('estadoUsuario')->nullable(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idRolFK')->references('idRol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
