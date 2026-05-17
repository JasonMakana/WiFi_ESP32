@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex flex-col items-center justify-center min-h-[60vh]" id="waiting-area">
        <div class="relative">
            <div class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></div>
            <div class="relative rounded-full p-10 bg-blue-600">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1V5a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1V5a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2"></path>
                </svg>
            </div>
        </div>
        
        <h2 class="mt-8 text-2xl font-semibold text-gray-700">Esperando Tarjeta NFC...</h2>
        <p class="text-gray-500">Por favor, pida al paciente que acerque su tarjeta al lector PN532.</p>
    </div>

    <div id="patient-profile" class="hidden bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-green-500">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-800" id="patient-name">Nombre del Paciente</h3>
                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-bold" id="blood-type">Tipo: O+</span>
            </div>
            <hr class="my-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Alergias</p>
                    <p class="text-lg text-gray-700" id="allergies">Ninguna</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Última Visita</p>
                    <p class="text-lg text-gray-700">Hoy - Consulta General</p>
                </div>
            </div>
            <div class="mt-6">
                <a href="#" id="view-history" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Ver Expediente Completo
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    // Función que revisa si hay una nueva lectura de NFC
    function checkNFC() {
        fetch('/api/check-nfc-status') // Crearemos esta ruta después
            .then(response => response.json())
            .then(data => {
                if (data.active) {
                    // 1. Ocultar el área de espera
                    document.getElementById('waiting-area').classList.add('hidden');
                    
                    // 2. Llenar los datos del paciente
                    document.getElementById('patient-name').innerText = data.paciente.nombre;
                    document.getElementById('blood-type').innerText = "Tipo: " + data.paciente.sangre;
                    document.getElementById('allergies').innerText = data.paciente.alergias;
                    document.getElementById('view-history').href = "/paciente/historial/" + data.paciente.id;

                    // 3. Mostrar el perfil
                    document.getElementById('patient-profile').classList.remove('hidden');
                }
            });
    }

    // Revisar cada 2 segundos
    setInterval(checkNFC, 2000);
</script>
@endsection