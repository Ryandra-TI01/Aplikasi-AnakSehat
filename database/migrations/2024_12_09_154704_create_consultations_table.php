<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Pengguna
            $table->foreignId('child_id')->constrained('children')->onDelete('cascade'); // Anak
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // Dokter
            $table->text('pesan'); // Keluhan pengguna
            $table->enum('status', ['pending', 'responded'])->default('pending'); // Status konsultasi
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
