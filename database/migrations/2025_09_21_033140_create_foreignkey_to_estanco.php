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
            $table->foreignId("estanco_id")->nullable()->constrained("estancos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->dropForeign(['estanco_id']); // eliminar la foreign key
            $table->dropColumn('estanco_id');    // eliminar la columna
        });
    }
};
