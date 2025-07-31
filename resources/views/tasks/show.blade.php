<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                Detalles de la Tarea
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('tasks.edit', $task) }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Editar
                </a>
                <a href="{{ route('tasks.index') }}" 
                   class="bg-slate-600 hover:bg-slate-700 text-white px-4 py-2 rounded-lg transition duration-300">
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-900">
                    <div class="border-b border-slate-200 pb-4 mb-6">
                        <div class="flex items-center justify-between">
                            <h1 class="text-3xl font-bold text-slate-900 {{ $task->status === 'completada' ? 'line-through text-slate-500' : '' }}">
                                {{ $task->title }}
                            </h1>
                            <div class="flex space-x-2">
                                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $task->priority_color }}">
                                    {{ ucfirst($task->priority) }}
                                </span>
                                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $task->status_color }}">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if($task->description)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Descripción</h3>
                            <p class="text-slate-700 {{ $task->status === 'completada' ? 'line-through' : '' }}">
                                {{ $task->description }}
                            </p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Información</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-slate-600">Creada:</span>
                                    <span class="text-slate-900">{{ $task->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600">Última actualización:</span>
                                    <span class="text-slate-900">{{ $task->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                                @if($task->due_date)
                                    <div class="flex justify-between">
                                        <span class="text-slate-600">Fecha de vencimiento:</span>
                                        <span class="text-slate-900">{{ $task->due_date->format('d/m/Y') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">Acciones</h3>
                            <div class="space-y-2">
                                <form method="POST" action="{{ route('tasks.toggle-status', $task) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="w-full text-left px-4 py-2 rounded-lg {{ $task->status === 'completada' ? 'bg-amber-100 text-amber-700 hover:bg-amber-200' : 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' }} transition duration-300">
                                        @if($task->status === 'completada')
                                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            Marcar como pendiente
                                        @else
                                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Marcar como completada
                                        @endif
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')"
                                            class="w-full text-left px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-300">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Eliminar tarea
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 