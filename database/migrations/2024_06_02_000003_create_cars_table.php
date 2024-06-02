<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('cars_name');
            $table->text('cars_description')->nullable();
            $table->integer('cars_price');
            $table->string('cars_image')->nullable();
            $table->string('cars_brand')->nullable();
            $table->string('cars_model')->nullable();
            $table->string('cars_nopol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
