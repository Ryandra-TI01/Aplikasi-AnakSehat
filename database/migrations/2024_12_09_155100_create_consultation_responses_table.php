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
        Schema::create('consultation_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultation_id')->constrained('consultations')->onDelete('cascade'); // Relasi ke tabel konsultasi
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Dokter (User dengan role dokter)
            $table->text('respon'); // Jawaban dari dokter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_responses');
    }
};
