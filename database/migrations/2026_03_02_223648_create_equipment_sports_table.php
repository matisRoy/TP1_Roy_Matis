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
        Schema::create('equipment_sports', function (Blueprint $table) {
            $table->unsignedBigInteger('sportId');
            $table->unsignedBigInteger('equipmentId');
            $table->timestamps();

            $table->primary(['sportId', 'equipmentId']);

            $table->foreign('sportId')->references('id')->on('sports');
            $table->foreign('equipmentId')->references('id')->on('equipment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_sports');
    }
};
