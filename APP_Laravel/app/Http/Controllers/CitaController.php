<?php

namespace App\Http\Controllers;

use App\Models\cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // 2. Accedemos al perfil de paciente de ese usuario
        // Asumiendo que en tu modelo User tienes: public function paciente() { return $this->hasOne(Paciente::class); }
        $paciente = $user->paciente;

        if (!$paciente) {
            return redirect()->back()->with('error', 'No tienes un perfil de paciente asociado.');
        }

        // 3. Obtenemos las citas del paciente con sus relaciones (doctor, área, etc.)
        // Usamos 'with' para evitar el problema de consultas N+1
        $citas = Cita::where('paciente_id', $paciente->id)
            ->with(['doctor', 'area']) 
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

        // 4. Retornamos la vista con los datos
        return view('paciente.citas', compact('citas'));
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
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cita $cita)
    {
        //
    }
}
