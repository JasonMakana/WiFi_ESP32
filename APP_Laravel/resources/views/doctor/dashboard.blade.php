<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'linkhealth-blue': '#0056b3',
                        'linkhealth-light': '#f4f7f6',
                    }
                }
            }
        }
    </script>
    <style>
        .animate-fade-in { animation: fadeIn 0.4s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        /* Estilo para el loader si quieres mantenerlo antes de cargar */
        .loader { border-top-color: #0056b3; animation: spinner 1.5s linear infinite; }
        @keyframes spinner { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>

    <div class="min-h-screen bg-linkhealth-light py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-screen-2xl mx-auto">
            
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/822/822143.png" alt="Logo" class="h-10 w-10">
                    <h1 class="text-3xl font-extrabold text-linkhealth-blue">LinkHealth</h1>
                    <span class="text-xl text-gray-500">| Panel de Control Médico</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600 bg-white p-2 px-4 rounded-full shadow-sm">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span>Lector NFC: Conectado</span>
                </div>
            </div>

            <div id="waiting-container" class="bg-white rounded-2xl shadow-xl p-16 text-center animate-fade-in">
                <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-24 w-24 mx-auto mb-10"></div>
                <h2 class="text-3xl font-bold text-gray-800">Esperando tarjeta del paciente...</h2>
                <p class="text-xl text-gray-500 mt-3 max-w-lg mx-auto">Por favor, acerque el dispositivo LinkHealth del paciente al lector NFC para cargar su historial clínico.</p>
                <img src="https://cdn.pixabay.com/photo/2021/11/14/06/17/nfc-6793134_1280.png" alt="NFC Scan" class="h-48 mx-auto mt-12 opacity-80">
            </div>

            <div id="patient-card" class="hidden animate-fade-in">
                
                <div class="bg-blue-600 rounded-xl p-4 flex items-center justify-between mb-8 shadow-lg text-white">
                    <div class="flex items-center gap-4">
                        <svg class="w-8 h-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <p class="text-lg font-bold">Paciente Identificado Exitosamente</p>
                            <p class="text-sm opacity-90">Historial médico recuperado de la red segura. Verifique la información.</p>
                        </div>
                    </div>
                    <button onclick="location.reload()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-full transition">
                        Limpiar / Nuevo Paciente
                    </button>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    
                    <div class="xl:col-span-2 space-y-8">
                        
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center gap-6 mb-6 pb-6 border-b border-gray-100">
                                <img src="https://via.placeholder.com/150" alt="Avatar" class="h-24 w-24 rounded-full border-4 border-gray-100 shadow-inner">
                                <div>
                                    <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Nombre del Paciente</h3>
                                    <p id="p-nombre" class="text-4xl font-extrabold text-gray-900">Buscando...</p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <span id="p-id" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full font-mono">#ID_ESPERA</span>
                                        <span class="text-sm text-gray-500">Registrado desde: 01/01/2024 (Representativo)</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-6 text-sm">
                                <div>
                                    <p class="font-semibold text-gray-800">Fecha de Nacimiento</p>
                                    <p class="text-gray-600">15/05/1990 (Fijo)</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Género</p>
                                    <p class="text-gray-600">Masculino (Fijo)</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Edad</p>
                                    <p class="text-gray-600">34 años (Fijo)</p>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <p class="font-semibold text-gray-800">Dirección</p>
                                    <p class="text-gray-600">Calle Falsa 123, Aguascalientes (Fijo)</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Teléfono</p>
                                    <p class="text-gray-600">449 123 4567 (Fijo)</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Seguro Médico</p>
                                    <p class="text-gray-600">Seguro Social (Fijo)</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="bg-white p-8 rounded-2xl shadow-lg border-l-8 border-red-500">
                                <div class="flex items-center gap-3 mb-4">
                                    <svg class="h-7 w-7 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                    <h3 class="text-lg font-semibold text-gray-700">Grupo Sanguíneo</h3>
                                </div>
                                <p id="p-sangre" class="text-6xl font-black text-red-600">--</p>
                            </div>
                            <div class="bg-white p-8 rounded-2xl shadow-lg border-l-8 border-orange-500">
                                <div class="flex items-center gap-3 mb-4">
                                    <svg class="h-7 w-7 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    <h3 class="text-lg font-semibold text-gray-700">Alergias Conocidas</h3>
                                </div>
                                <p id="p-alergias" class="text-2xl font-semibold text-gray-800">Cargando...</p>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Historial Médico Reciente (Fijo)</h3>
                            <div class="space-y-5 text-sm">
                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <p class="font-semibold text-gray-800">Visita Reciente (10/10/2023)</p>
                                    <p class="text-gray-600 mt-1">Consulta General por fiebre y tos leve.</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <p class="font-semibold text-gray-800">Diagnósticos Activos</p>
                                    <p class="text-gray-600 mt-1">Hipertensión Arterial (controlada).</p>
                                </div>
                                <div class="bg-red-50 p-4 rounded-lg border border-red-200">
                                    <p class="font-semibold text-red-900">Medicamentos Actuales</p>
                                    <p class="text-red-700 mt-1">Losartán 50mg (1 vez al día).</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 sticky top-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Agendar Nueva Cita (Representativo)</h3>
                            <div class="space-y-4">
                                <label class="block text-sm font-medium text-gray-700">Especialidad</label>
                                <select class="w-full p-2 border border-gray-300 rounded-md shadow-sm"><option>Cardiología</option></select>
                                
                                <label class="block text-sm font-medium text-gray-700">Doctor</label>
                                <select class="w-full p-2 border border-gray-300 rounded-md shadow-sm"><option>Dr. Fernando Robles</option></select>
                                
                                <label class="block text-sm font-medium text-gray-700">Hora</label>
                                <input type="time" class="w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                
                                <button class="w-full mt-6 bg-linkhealth-blue hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                                    CONFIRMAR CITA
                                
                                <p class="text-xs text-gray-400 mt-3 text-center">Esta sección es visual por el momento.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Función que consulta al servidor cada 1.5 segundos
        const checkNfc = setInterval(function() {
            fetch('/api/check-nfc-status')
                .then(response => response.json())
                .then(data => {
                    if (data.active) {
                        console.log("Paciente detectado:", data.paciente);
                        
                        // 1. Ocultar el círculo de espera
                        document.getElementById('waiting-container').classList.add('hidden');
                        
                        // 2. Llenar los campos con la información REAL de la DB (NFC)
                        // Los datos representativos definidos en el HTML no cambian.
                        document.getElementById('p-nombre').innerText = data.paciente.nombre;
                        document.getElementById('p-id').innerText = '#' + data.paciente.id;
                        document.getElementById('p-sangre').innerText = data.paciente.sangre;
                        document.getElementById('p-alergias').innerText = data.paciente.alergias;
                        
                        // 3. Mostrar la ficha médica avanzada
                        const card = document.getElementById('patient-card');
                        card.classList.remove('hidden');
                        
                        // Detener el intervalo para no saturar
                        clearInterval(checkNfc);
                    }
                })
                .catch(error => console.error('Error al consultar NFC:', error));
        }, 1500);
    </script>
</x-app-layout>