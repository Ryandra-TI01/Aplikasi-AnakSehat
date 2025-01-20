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
        Schema::disableForeignKeyConstraints();

        Schema::create('child_health_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id')->references('id')->on('children');
            $table->integer('bulan');
            $table->double('berat')->comment('berat in kg');
            $table->double('tinggi')->comment('tinggi in cm');
            $table->enum('status_gizi', ["UnderWeight", "Normal", "OverWeight"])->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_health_data');
    }
};
