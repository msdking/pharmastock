<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGestionnaireIdToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('gestionnaire_id')->nullable();
            $table->foreign('gestionnaire_id')->references('id')->on('gestionnaires');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['gestionnaire_id']);
            $table->dropColumn('gestionnaire_id');
        });
    }
}
