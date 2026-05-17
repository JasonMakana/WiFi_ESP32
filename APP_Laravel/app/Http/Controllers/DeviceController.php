<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Funciones para la conexion de la ESP32 con la BD en ambito de Access Point

    public function setup(Request $request)
    {
        // Validación de los datos de LinkHealth
        $validated = $request->validate([
            'mac_address'     => 'required|string',
            'paciente_name' => 'required|string|max:255',
            'clinica_id'      => 'required|string',
            'ssid'            => 'required|string',
            'password'        => 'nullable|string|max:255',
        ]);

        // Guardado o actualización el dispositivo
        $device = Device::updateOrCreate(
            ['mac_address' => $validated['mac_address']],
            [
                'paciente_name' => $validated['paciente_name'],
                'clinica_id'      => $validated['clinica_id'],
                'ssid'            => $validated['ssid'],
                'password'        => $validated['password'],
                'is_active'       => true
            ]
        );

        // Respuesta JSON para la ESP32
        return response()->json([
            'status' => 'success',
            'message' => 'Dispositivo ' . $device->mac_address . ' vinculado correctamente.',
        ], 201);
    }

    public function getCredentials($mac)
    {
        // Busqueda del dispositivo por direccion MAC
        $device = Device::where('mac_address', $mac)->first();

        // Respuesta JSON con las credenciales WiFi si el dispositivo esta registrado
        if ($device) {
            return response()->json([
                'registered' => true,
                'ssid'       => $device->ssid,
                'password'   => $device->password, // Implementacion de la contraseña en JSON
                'paciente'   => $device->paciente_name
            ], 200);
        }

        // Respuesta JSON indicando que el dispositivo no esta registrado
        return response()->json(['registered' => false], 404);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        //
    }
}
