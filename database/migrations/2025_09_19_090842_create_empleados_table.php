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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->nullable();
            $table->string('cedula', 45)->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono', 45);
            $table->string('correo', 100)->unique();
            $table->text('direccion')->nullable();
            $table->boolean('estado')->default(1);
            $table->foreignId('rol_id')->nullable()->constrained('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
