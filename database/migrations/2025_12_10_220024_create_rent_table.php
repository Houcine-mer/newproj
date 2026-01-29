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
        Schema::create('rent', function (Blueprint $table) {
            
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');

            $table->primary(['user_id', 'car_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

            $table->date('start_date');
            $table->integer('number_of_days');
            $table->decimal('total_price' ,10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rent', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['car_id']);
        });
        Schema::dropIfExists('rent');
    }
};
