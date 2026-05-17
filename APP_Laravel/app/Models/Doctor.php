<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Doctor extends Model
{
    protected $primaryKey = 'id_doctor';

    public function citas()
    {
        // Un doctor tiene muchas citas (consultas)
        return $this->hasMany(Cita::class, 'id_doctor');
    }
}
