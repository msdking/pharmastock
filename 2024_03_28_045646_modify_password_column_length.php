<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPasswordColumnLength extends Migration
{

public function up() {
    Schema::table('gestionnaire', function (Blueprint $table) {
     $table->string('password', 60)->change();
});

}

public function down()
{ Schema::table('gestionnaire', function (Blueprint $table) {
$table->string('password')->change(); });

}

}
