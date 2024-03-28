<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->increments('id_product');
        $table->unsignedInteger('id_category')->nullable();
        $table->string('nom', 100);
        $table->text('description')->nullable();
        $table->decimal('prix_u', 10, 2);
        $table->integer('quantite')->nullable();
        $table->date('date_expiration')->nullable();
        $table->binary('photo')->nullable();
        $table->timestamps();

        $table->foreign('id_category')->references('id_category')->on('categories');
    });
}


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
