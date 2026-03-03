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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rating');
            $table->text('comment');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('rentalId');
            $table->timestamps();

            $table->foreign('user_Id')->references('id')->on('users');
            $table->foreign('rental_Id')->references('id')->on('rentals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
