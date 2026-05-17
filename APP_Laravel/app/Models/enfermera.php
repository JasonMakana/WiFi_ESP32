<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class enfermera extends Model
{
    protected $primaryKey = 'id_enfermera';

    public function areas() {
        return $this->belongsToMany(Area::class, 'enfermera_areas', 'id_enfermera', 'id_area')
                    ->withPivot('horario');
    }
}
