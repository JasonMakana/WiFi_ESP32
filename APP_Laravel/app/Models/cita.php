<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Area;
use App\Models\Receta;
use App\Models\Enfermera;

class cita extends Model
{
    protected $primaryKey = 'id_cita';

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    // Una cita puede tener una receta
    public function receta()
    {
        return $this->hasOne(Receta::class, 'id_cita');
    }

    // Relación N a N con Enfermeras (quiénes atendieron la cita)
    public function enfermeras()
    {
        return $this->belongsToMany(Enfermera::class, 'cita_enfermeras', 'id_cita', 'id_enfermera');
    }
}
