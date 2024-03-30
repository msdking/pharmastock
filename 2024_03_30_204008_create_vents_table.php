<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentsTable extends Migration
{
    public function up()
    {
        Schema::create('vents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->integer('quantite')->nullable();
            $table->unsignedBigInteger('id_client')->nullable();
            $table->dateTime('date')->nullable();
            $table->enum('type', ['achat', 'vente'])->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->foreign('id_client')->references('id_client')->on('clients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vents');
    }
}

