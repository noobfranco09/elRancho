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
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->integer('codigo')->unique();
            $table->integer('precio')->default(0);
            $table->string('imagen', 200)->nullable();
            $table->string('registro', 200)->nullable();
            $table->string('guia_sanitaria', 200)->nullable();
            $table->enum('sexo', ['M', 'F', 'NA'])->default('NA');
            $table->string('color', 45);
            $table->text('marcas')->nullable();
            $table->enum('salud', ['enfermo', 'sin enfermedades'])->default('sin enfermedades');
            $table->foreignId('padre1_id')->nullable()->constrained('animales');
            $table->foreignId('padre2_id')->nullable()->constrained('animales');
            $table->date('fecha_nacimiento');
            $table->foreignId('venta_id')->nullable()->constrained('ventas');
            $table->enum('estado', ['activo', 'inactivo'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
