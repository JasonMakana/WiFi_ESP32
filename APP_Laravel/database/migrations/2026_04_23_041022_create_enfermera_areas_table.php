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
        Schema::create('enfermera_areas', function (Blueprint $table) {
            $table->foreignId('id_enfermera')->constrained('enfermeras', 'id_enfermera');
            $table->foreignId('id_area')->constrained('areas', 'id_area');
            $table->string('horario', 50)->nullable();
            $table->primary(['id_enfermera', 'id_area']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfermera_areas');
    }
};
