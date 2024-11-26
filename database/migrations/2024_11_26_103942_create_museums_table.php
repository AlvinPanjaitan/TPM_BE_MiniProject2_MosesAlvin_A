<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/YYYY_MM_DD_create_museums_table.php
public function up()
{
    Schema::create('museums', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->string('location');
        $table->unsignedBigInteger('category_id');
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('museums');
    }
};
