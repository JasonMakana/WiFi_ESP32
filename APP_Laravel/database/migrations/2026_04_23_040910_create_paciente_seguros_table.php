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
        Schema::create('paciente_seguros', function (Blueprint $table) {
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->foreignId('id_seguro')->constrained('seguros', 'id_seguro');
            $table->string('numero_poliza', 50)->nullable();
            $table->primary(['id_paciente', 'id_seguro']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_seguros');
    }
};
