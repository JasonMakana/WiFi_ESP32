<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class receta extends Model
{
    protected $primaryKey = 'id_receta';

    public function cita()
    {
        // Una receta pertenece a una consulta específica
        return $this->belongsTo(Cita::class, 'id_cita');
    }
}
