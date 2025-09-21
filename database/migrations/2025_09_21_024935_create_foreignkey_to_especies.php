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
        Schema::table('animales', function (Blueprint $table) {
            $table->foreignId("especie_id")->constrained("especies");
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->dropForeign(['especie_id']); // eliminar la foreign key
            $table->dropColumn('especie_id');    // eliminar la columna
        });
    }
};
