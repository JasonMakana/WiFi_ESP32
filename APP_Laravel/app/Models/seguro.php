<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class seguro extends Model
{
    protected $primaryKey = 'id_seguro';

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_seguros', 'id_seguro', 'id_paciente')
                    ->withPivot('numero_poliza');
    }
}
