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
        Schema::create('vacunaciones', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained('animales');
            $table->foreignId('vacuna_id')->constrained('vacunas');
            $table->date('fecha_vacunacion')->nullable();

            $table->primary(['animal_id', 'vacuna_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacunaciones');
    }
};
