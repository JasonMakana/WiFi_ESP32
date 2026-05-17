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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->foreignId('id_doctor')->constrained('doctors', 'id_doctor');
            $table->foreignId('id_area')->constrained('areas', 'id_area');
            $table->dateTime('fecha')->nullable();
            $table->text('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
