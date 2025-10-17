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
        Schema::create('veterinarios', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 45)->unique();
            $table->string('nombre', 100);
            $table->string('telefono', 45);
            $table->string('correo', 100)->unique();
            $table->text('especialidad')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarios');
    }
};
