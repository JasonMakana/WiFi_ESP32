<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expediente;
use App\Models\Cita;
use App\Models\Seguro;

class Paciente extends Model
{
    protected $primaryKey = 'id_paciente'; // Obligatorio por no ser 'id'

    // Relación 1 a 1 con Expediente
    public function expediente()
    {
        return $this->hasOne(Expediente::class, 'id_paciente');
    }

    // Relación 1 a N con Citas
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_paciente');
    }

    // Relación N a N con Seguros
    public function seguros()
    {
        return $this->belongsToMany(Seguro::class, 'paciente_seguros', 'id_paciente', 'id_seguro')
                    ->withPivot('numero_poliza');
    }
}
