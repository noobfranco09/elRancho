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
        Schema::create('alimentaciones', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained('animales');
            $table->foreignId('alimento_id')->constrained('alimentos');
            $table->timestamp('fecha')->nullable();

            $table->primary(['animal_id', 'alimento_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentaciones');
    }
};
