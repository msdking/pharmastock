<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestionnaire', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 255)->nullable();
            $table->integer('tel')->nullable();
            $table->string('address', 50)->nullable();
            $table->binary('photo')->nullable();
            $table->string('civilite', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestionnaire');
    }
}
