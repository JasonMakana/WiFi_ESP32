<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'mac_address',
        'paciente_name',
        'clinica_id',
        'ssid',
        'password', // Implementacion de la contraseña
        'is_active'
    ];
}
