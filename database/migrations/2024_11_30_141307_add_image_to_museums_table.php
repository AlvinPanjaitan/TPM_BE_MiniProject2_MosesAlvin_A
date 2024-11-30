<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToMuseumsTable extends Migration
{
    public function up()
    {
        Schema::table('museums', function (Blueprint $table) {
            $table->string('image')->nullable(); // Menambahkan kolom image
        });
    }

    public function down()
    {
        Schema::table('museums', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
