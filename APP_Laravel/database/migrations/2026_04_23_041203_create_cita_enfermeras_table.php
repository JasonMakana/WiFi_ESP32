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
        Schema::create('cita_enfermeras', function (Blueprint $table) {
            $table->foreignId('id_cita')->constrained('citas', 'id_cita');
            $table->foreignId('id_enfermera')->constrained('enfermeras', 'id_enfermera');
            $table->primary(['id_cita', 'id_enfermera']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita_enfermeras');
    }
};
