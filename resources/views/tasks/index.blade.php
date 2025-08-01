<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                Mis Tareas
            </h2>
            <a href="{{ route('tasks.create') }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Nueva Tarea
            </a>
        </div>
    </x-slot>

    <div class="py-12" x-data="taskManager()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes de éxito/error -->
            <div x-show="message.show" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 class="mb-6 p-4 rounded-lg"
                 :class="message.type === 'success' ? 'bg-emerald-100 border border-emerald-400 text-emerald-700' : 'bg-red-100 border border-red-400 text-red-700'">
                <div class="flex items-center">
                    <svg x-show="message.type === 'success'" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <svg x-show="message.type === 'error'" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span x-text="message.text"></span>
                    <button @click="message.show = false" class="ml-auto text-current hover:opacity-75">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mensaje de sesión -->
            @if(session('success'))
                <div class="mb-6 bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-900">
                    @if($tasks->count() > 0)
                        <div class="grid gap-6">
                            @foreach($tasks as $task)
                                <div class="border border-slate-200 rounded-lg p-6 hover:shadow-md transition duration-300 {{ $task->status === 'completada' ? 'bg-slate-50' : 'bg-white' }}"
                                     x-data="taskItem({{ $task->id }})">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3 mb-2">
                                                <h3 class="text-lg font-semibold {{ $task->status === 'completada' ? 'line-through text-slate-500' : 'text-slate-900' }}">
                                                    {{ $task->title }}
                                                </h3>
                                                <span class="px-2 py-1 text-xs font-medium rounded-full {{ $task->priority_color }}">
                                                    {{ ucfirst($task->priority) }}
                                                </span>
                                                <span class="px-2 py-1 text-xs font-medium rounded-full {{ $task->status_color }}">
                                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                            </div>
                                            
                                            @if($task->description)
                                                <p class="text-slate-600 mb-3 {{ $task->status === 'completada' ? 'line-through' : '' }}">
                                                    {{ $task->description }}
                                                </p>
                                            @endif
                                            
                                            <div class="flex items-center space-x-4 text-sm text-slate-500">
                                                <span>Creada: {{ $task->created_at->format('d/m/Y H:i') }}</span>
                                                @if($task->due_date)
                                                    <span>Vence: {{ $task->due_date->format('d/m/Y') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center space-x-2">
                                            <!-- Ver -->
                                            <a href="{{ route('tasks.show', $task) }}"
                                               class="p-2 bg-sky-100 text-sky-600 rounded-lg hover:bg-sky-200 transition duration-300"
                                               title="Ver tarea">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            <!-- Toggle Status -->
                                            <button @click="$parent.toggleTaskStatus()" 
                                                    :disabled="isToggling"
                                                    class="p-2 rounded-lg transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed {{ $task->status === 'completada' ? 'bg-amber-100 text-amber-600 hover:bg-amber-200' : 'bg-emerald-100 text-emerald-600 hover:bg-emerald-200' }}"
                                                    title="Marcar como {{ $task->status === 'completada' ? 'pendiente' : 'completada' }}">
                                                <svg x-show="!isToggling" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    @if($task->status === 'completada')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    @endif
                                                </svg>
                                                <svg x-show="isToggling" class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                </svg>
                                            </button>

                                            <!-- Edit -->
                                            <a href="{{ route('tasks.edit', $task) }}" 
                                               class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 transition duration-300"
                                               title="Editar tarea">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <!-- Delete -->
                                            <div class="relative">
                                                <button @click="showConfirmDelete = true" 
                                                        class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition duration-300"
                                                        title="Eliminar tarea">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>

                                                <!-- Confirmación de eliminación -->
                                                <div x-show="showConfirmDelete" 
                                                     x-transition:enter="transition ease-out duration-200"
                                                     x-transition:enter-start="opacity-0 scale-95"
                                                     x-transition:enter-end="opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-150"
                                                     x-transition:leave-start="opacity-100 scale-100"
                                                     x-transition:leave-end="opacity-0 scale-95"
                                                     @click.away="showConfirmDelete = false"
                                                     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                                    <div class="bg-white rounded-lg shadow-xl border border-slate-200 w-96 max-w-sm mx-4">
                                                    <div class="p-6">
                                                        <div class="flex items-center mb-4">
                                                            <div class="flex-shrink-0">
                                                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-3">
                                                                <h3 class="text-lg font-medium text-slate-900">Confirmar eliminación</h3>
                                                            </div>
                                                        </div>
                                                        <div class="mb-6">
                                                            <p class="text-sm text-slate-600">¿Estás seguro de que quieres eliminar esta tarea? Esta acción no se puede deshacer.</p>
                                                        </div>
                                                        <div class="flex space-x-3">
                                                            <button @click="deleteTask()" 
                                                                    :disabled="isDeleting"
                                                                    class="flex-1 bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed transition duration-300">
                                                                <span x-show="!isDeleting">Eliminar</span>
                                                                <span x-show="isDeleting">Eliminando...</span>
                                                            </button>
                                                            <button @click="showConfirmDelete = false" 
                                                                    class="flex-1 bg-slate-200 text-slate-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-slate-300 transition duration-300">
                                                                Cancelar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6">
                            {{ $tasks->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900">No hay tareas</h3>
                            <p class="mt-1 text-sm text-slate-500">Comienza creando tu primera tarea.</p>
                            <div class="mt-6">
                                <a href="{{ route('tasks.create') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Crear primera tarea
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function taskManager() {
            return {
                message: {
                    show: false,
                    text: '',
                    type: 'success'
                },
                
                showMessage(text, type = 'success') {
                    this.message.text = text;
                    this.message.type = type;
                    this.message.show = true;
                    
                    // Auto-hide after 5 seconds
                    setTimeout(() => {
                        this.message.show = false;
                    }, 5000);
                }
            }
        }

        function taskItem(taskId) {
            return {
                taskId: taskId,
                isDeleting: false,
                isToggling: false,
                showConfirmDelete: false,
                
                async toggleStatus() {
                    if (this.isToggling) return;
                    
                    this.isToggling = true;
                    
                    try {
                        const response = await fetch(`/tasks/${this.taskId}/toggle-status`, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        });
                        
                        if (response.ok) {
                            const data = await response.json();
                            // Reload the page to show updated status
                            window.location.reload();
                        } else {
                            const error = await response.json();
                            alert(error.message || 'Error al actualizar el estado');
                        }
                    } catch (error) {
                        alert('Error de conexión');
                    } finally {
                        this.isToggling = false;
                    }
                },
                
                async deleteTask() {
                    if (this.isDeleting) return;
                    this.isDeleting = true;
                    try {
                        const response = await fetch(`/tasks/${this.taskId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        });
                        if (response.ok) {
                            // Recargar la página para reflejar el cambio
                            window.location.reload();
                        } else {
                            const error = await response.json();
                            alert(error.message || 'Error al eliminar la tarea');
                        }
                    } catch (error) {
                        alert('Error de conexión');
                    } finally {
                        this.isDeleting = false;
                        this.showConfirmDelete = false;
                    }
                }
            }
        }
    </script>
</x-app-layout> 