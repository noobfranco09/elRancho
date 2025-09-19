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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animales');
            $table->foreignId('veterinario_id')->constrained('veterinarios');
            $table->text('motivo');
            $table->text('diagnostico')->default('Sin diagnostico');
            $table->dateTime('fecha_revision');

            $table->primary(['id', 'animal_id', 'veterinario_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
