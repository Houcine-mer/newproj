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
            $table->timestamps();

            $table->string('brand_name');
            $table->foreign('brand_name')->references('name')->on('brands')->onDelete('cascade');
            $table->string('name');
            $table->year('year')->nullable();
            $table->string('image_url');
            $table->decimal('buyprice',10,2)->nullable();
            $table->decimal('rentprice',10,2)->nullable();
            $table->decimal('tourprice',10,2)->nullable();
            $table->boolean('buy');
            $table->boolean('rent');
            $table->boolean('tour');
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
