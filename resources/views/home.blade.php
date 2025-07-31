<x-guest-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto shadow-xl rounded-lg p-10 text-center bg-white">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido al Sistema de Gestión de Tareas</h1>
            <p class="text-gray-600 text-lg mb-6">
                Esta plataforma permite registrar, visualizar y administrar tareas personales de manera simple y eficiente.
            </p>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition">
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}" class="px-6 py-2 border border-indigo-600 text-indigo-600 font-semibold rounded hover:bg-indigo-100 transition">
                    Crear cuenta
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
