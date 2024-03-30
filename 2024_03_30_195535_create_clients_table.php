<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('nom', 50)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('address', 50)->nullable();
            $table->bigInteger('tel')->nullable();
            $table->string('grade', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
