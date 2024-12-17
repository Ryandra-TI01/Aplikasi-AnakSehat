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
        Schema::create('child_health_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->constrained('children')->onDelete('cascade');
            $table->float('weight')->comment('Weight in kg');
            $table->float('height')->comment('Height in cm');
            $table->float('head_circumference')->nullable()->comment('Head circumference in cm');
            $table->date('recorded_at')->comment('Date of health record');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_health_data');
    }
};
