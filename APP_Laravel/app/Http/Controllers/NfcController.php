<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente; 
use Illuminate\Support\Facades\Cache;

class NfcController extends Controller
{
    public function verificacion(Request $request)
    {
        // 1. Validar que llegó el ID
        $request->validate(['nfc_id' => 'required']);

        // 2. Buscar al usuario
        $usuario = User::where('nfc_id', $request->nfc_id)->first();

        if ($usuario) {
    
            // Guardamos el ID en el cache para que el JavaScript del dashboard lo encuentre
            Cache::put('ultimo_nfc_leido', $usuario->id, 60); 

            return response()->json([
                'status' => 'success',
                'message' => 'Paciente detectado',
                'nombre' => $usuario->name
            ], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'No encontrado'], 404);
    }


   public function checkStatus()
{
    $id = Cache::get('ultimo_nfc_leido');

    if ($id) {
        $usuario = User::find($id); // Lo llamamos usuario para ser claros
        
        if (!$usuario) {
            return response()->json(['active' => false]);
        }

        Cache::forget('ultimo_nfc_leido'); 

        return response()->json([
            'active' => true,
            'paciente' => [
    'id' => $usuario->id,
    'nombre' => $usuario->name,
    'sangre' => 'O+', 
    'alergias' => 'Ninguna'
]
        ]);
    }

    return response()->json(['active' => false]);
}
}