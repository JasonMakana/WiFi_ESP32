<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Area;
use App\Models\Cita;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creacion de un área de prueba
    $area = Area::create(['nombre' => 'Urgencias']);

    // Creacion de Usuario Doctor
    $userDoc = User::create([
        'name' => 'Dr. Alexander',
        'email' => 'doctor@gmail.com',
        'password' => bcrypt('admin123'),
        'role' => 'doctor'
    ]);

    // Creacion de Perfil de Doctor ligado al usuario
    Doctor::create([
        'nombre' => 'Dr. Alexander',
        'especialidad' => 'Informática Médica',
        'user_id' => $userDoc->id
    ]);

    // Crear Usuario Paciente
    $userPac = User::create([
        'name' => 'Juan Pérez',
        'email' => 'paciente@gmail.com',
        'password' => bcrypt('paciente123'),
        'role' => 'paciente'
    ]);

    // Creacion de Perfil de Paciente ligado al usuario
    $paciente = Paciente::create([
        'nombre' => 'Juan Pérez',
        'user_id' => $userPac->id,
        'nfc_uid' => '7DF21707',
        'telefono' => '4491234567'
    ]);

    // Creacion de la Cita de prueba
    Cita::create([
        'id_paciente' => $paciente->id_paciente,
        'id_doctor' => 1,
        'id_area' => $area->id_area,
        'fecha' => now(),
        'motivo' => 'Paciente presenta fiebre alta tras escaneo de tarjeta NFC.'
    ]);

    // Creacion de un segundo paciente para pruebas adicionales
    $userPac = User::create([
        'name' => 'Karla Macias',
        'email' => 'paciente2@gmail.com',
        'password' => bcrypt('paciente2123'),
        'role' => 'paciente'
    ]);

    // Creacion de Perfil de Paciente ligado al usuario
    $paciente = Paciente::create([
        'nombre' => 'Karla Macias',
        'user_id' => $userPac->id,
        'nfc_uid' => '7ED72A07',
        'telefono' => '4491234567'
    ]);
    
    }
}
