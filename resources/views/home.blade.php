<x-guest-layout>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <x-application-logo class="w-8 h-8 fill-current text-indigo-600" />
                        <span class="ml-2 text-xl font-bold text-gray-900">TaskManager</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 overflow-hidden pt-16">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Gestiona tus tareas de manera
                    <span class="text-emerald-400">inteligente</span>
                </h1>
                <p class="text-xl text-slate-200 mb-8 max-w-3xl mx-auto">
                    Organiza, prioriza y completa tus tareas con nuestro sistema moderno desarrollado con Laravel. 
                    Una plataforma robusta y fácil de usar para maximizar tu productividad.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-lg text-slate-900 bg-white hover:bg-slate-50 transition duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Crear cuenta gratuita
                    </a>
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-8 py-3 border-2 border-white text-lg font-medium rounded-lg text-white hover:bg-white hover:text-slate-900 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    Características principales
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Nuestro sistema ofrece todo lo que necesitas para gestionar tus tareas de manera eficiente
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Gestión completa de tareas</h3>
                    <p class="text-slate-600">
                        Crea, edita, elimina y organiza tus tareas con una interfaz intuitiva. 
                        Sistema CRUD completo con validaciones robustas.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Autenticación segura</h3>
                    <p class="text-slate-600">
                        Sistema de autenticación completo con registro, login, recuperación de contraseña 
                        y verificación de email implementado con Laravel Breeze.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Interfaz moderna</h3>
                    <p class="text-slate-600">
                        Diseño responsive con Tailwind CSS y Alpine.js. Componentes reutilizables 
                        con Blade templates para una experiencia de usuario excepcional.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-amber-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Base de datos robusta</h3>
                    <p class="text-slate-600">
                        Migraciones y seeders para estructurar y poblar la base de datos MySQL. 
                        Relaciones correctas y optimización de consultas con Eloquent ORM.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-cyan-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Arquitectura MVC</h3>
                    <p class="text-slate-600">
                        Implementación completa del patrón Model-View-Controller aprendido 
                        durante la ingeniería en DuocUC. Código limpio y mantenible.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white rounded-xl p-8 hover:shadow-lg transition duration-300 border border-slate-200">
                    <div class="w-12 h-12 bg-slate-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Control de versiones</h3>
                    <p class="text-slate-600">
                        Repositorio Git estructurado y documentado para facilitar la colaboración. 
                        Fácil clonación y configuración del proyecto.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    Tecnologías utilizadas
                </h2>
                <p class="text-xl text-slate-600">
                    Desarrollado con las mejores herramientas y frameworks modernos
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Laravel -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900">Laravel</h3>
                    <p class="text-sm text-slate-600">Framework PHP</p>
                </div>
                
                <!-- Tailwind CSS -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900">Tailwind CSS</h3>
                    <p class="text-sm text-slate-600">Framework CSS</p>
                </div>
                
                <!-- Alpine.js -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-emerald-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900">Alpine.js</h3>
                    <p class="text-sm text-slate-600">JavaScript</p>
                </div>
                
                <!-- MySQL -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900">MySQL</h3>
                    <p class="text-sm text-slate-600">Base de datos</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-16 bg-gradient-to-r from-slate-900 to-purple-900">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                ¿Listo para organizar tus tareas?
            </h2>
            <p class="text-xl text-slate-200 mb-8">
                Únete a cientos de usuarios que ya están maximizando su productividad con nuestro sistema
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-lg text-slate-900 bg-white hover:bg-slate-50 transition duration-300 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Comenzar ahora
                </a>
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center px-8 py-3 border-2 border-white text-lg font-medium rounded-lg text-white hover:bg-white hover:text-slate-900 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Acceder
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Sistema de Gestión de Tareas</h3>
                <p class="text-slate-400 mb-6">
                    Desarrollado como proyecto académico para demostrar competencias en Laravel, 
                    arquitectura MVC y desarrollo web moderno.
                </p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-slate-400 hover:text-white transition duration-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition duration-300">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
                <div class="mt-8 pt-8 border-t border-slate-800">
                    <p class="text-slate-400 text-sm">
                        © 2024 Sistema de Gestión de Tareas. Desarrollado con ❤️ usando Laravel y Tailwind CSS.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</x-guest-layout>
