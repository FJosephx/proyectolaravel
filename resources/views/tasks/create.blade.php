<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Crear Nueva Tarea
        </h2>
    </x-slot>

    <div class="py-12" x-data="taskForm()">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes de error -->
            <div x-show="errors.length > 0" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-medium">Por favor corrige los siguientes errores:</h4>
                        <ul class="mt-1 list-disc list-inside">
                            <template x-for="error in errors" :key="error">
                                <li x-text="error"></li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-900">
                    <form @submit.prevent="submitForm()" class="space-y-6">
                        @csrf

                        <!-- Título -->
                        <div>
                            <x-input-label for="title" value="Título" />
                            <x-text-input id="title" 
                                         class="block mt-1 w-full bg-white text-slate-900 border-slate-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                         type="text" 
                                         name="title" 
                                         x-model="form.title"
                                         :class="fieldErrors.title ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                         required 
                                         autofocus />
                            <div x-show="fieldErrors.title" x-text="fieldErrors.title" class="mt-2 text-sm text-red-600"></div>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <x-input-label for="description" value="Descripción (opcional)" />
                            <textarea id="description" 
                                      name="description" 
                                      rows="4" 
                                      x-model="form.description"
                                      class="block mt-1 w-full bg-white text-slate-900 border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            <div x-show="fieldErrors.description" x-text="fieldErrors.description" class="mt-2 text-sm text-red-600"></div>
                        </div>

                        <!-- Prioridad -->
                        <div>
                            <x-input-label for="priority" value="Prioridad" />
                            <select id="priority" 
                                    name="priority" 
                                    x-model="form.priority"
                                    :class="fieldErrors.priority ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                    class="block mt-1 w-full bg-white text-slate-900 border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Selecciona una prioridad</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                            <div x-show="fieldErrors.priority" x-text="fieldErrors.priority" class="mt-2 text-sm text-red-600"></div>
                        </div>

                        <!-- Estado -->
                        <div>
                            <x-input-label for="status" value="Estado" />
                            <select id="status" 
                                    name="status" 
                                    x-model="form.status"
                                    :class="fieldErrors.status ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                    class="block mt-1 w-full bg-white text-slate-900 border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Selecciona un estado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="en_progreso">En Progreso</option>
                                <option value="completada">Completada</option>
                            </select>
                            <div x-show="fieldErrors.status" x-text="fieldErrors.status" class="mt-2 text-sm text-red-600"></div>
                        </div>

                        <!-- Fecha de vencimiento -->
                        <div>
                            <x-input-label for="due_date" value="Fecha de vencimiento (opcional)" />
                            <x-text-input id="due_date" 
                                         class="block mt-1 w-full bg-white text-slate-900 border-slate-300 focus:border-indigo-500 focus:ring-indigo-500" 
                                         type="date" 
                                         name="due_date" 
                                         x-model="form.due_date"
                                         :class="fieldErrors.due_date ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''" />
                            <div x-show="fieldErrors.due_date" x-text="fieldErrors.due_date" class="mt-2 text-sm text-red-600"></div>
                        </div>

                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('tasks.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-slate-700 uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-400 active:bg-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                            <x-primary-button :disabled="isSubmitting">
                                <span x-show="!isSubmitting">Crear Tarea</span>
                                <span x-show="isSubmitting">Creando...</span>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function taskForm() {
            return {
                form: {
                    title: '',
                    description: '',
                    priority: '',
                    status: '',
                    due_date: ''
                },
                errors: [],
                fieldErrors: {},
                isSubmitting: false,

                validateForm() {
                    this.errors = [];
                    this.fieldErrors = {};

                    // Validar título
                    if (!this.form.title.trim()) {
                        this.fieldErrors.title = 'El título es obligatorio';
                        this.errors.push('El título es obligatorio');
                    } else if (this.form.title.length > 255) {
                        this.fieldErrors.title = 'El título no puede tener más de 255 caracteres';
                        this.errors.push('El título no puede tener más de 255 caracteres');
                    }

                    // Validar prioridad
                    if (!this.form.priority) {
                        this.fieldErrors.priority = 'La prioridad es obligatoria';
                        this.errors.push('La prioridad es obligatoria');
                    } else if (!['baja', 'media', 'alta'].includes(this.form.priority)) {
                        this.fieldErrors.priority = 'La prioridad debe ser baja, media o alta';
                        this.errors.push('La prioridad debe ser baja, media o alta');
                    }

                    // Validar estado
                    if (!this.form.status) {
                        this.fieldErrors.status = 'El estado es obligatorio';
                        this.errors.push('El estado es obligatorio');
                    } else if (!['pendiente', 'en_progreso', 'completada'].includes(this.form.status)) {
                        this.fieldErrors.status = 'El estado debe ser pendiente, en progreso o completada';
                        this.errors.push('El estado debe ser pendiente, en progreso o completada');
                    }

                    // Validar fecha de vencimiento
                    if (this.form.due_date) {
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        const dueDate = new Date(this.form.due_date);
                        
                        if (dueDate < today) {
                            this.fieldErrors.due_date = 'La fecha de vencimiento no puede ser anterior a hoy';
                            this.errors.push('La fecha de vencimiento no puede ser anterior a hoy');
                        }
                    }

                    return this.errors.length === 0;
                },

                async submitForm() {
                    if (!this.validateForm()) {
                        return;
                    }

                    this.isSubmitting = true;

                    try {
                        const response = await fetch('{{ route('tasks.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(this.form)
                        });

                        if (response.ok) {
                            // Redirigir a la lista de tareas
                            window.location.href = '{{ route('tasks.index') }}';
                        } else {
                            const data = await response.json();
                            
                            if (data.errors) {
                                // Errores de validación del servidor
                                this.fieldErrors = data.errors;
                                this.errors = Object.values(data.errors).flat();
                            } else {
                                this.errors = [data.message || 'Error al crear la tarea'];
                            }
                        }
                    } catch (error) {
                        this.errors = ['Error de conexión'];
                    } finally {
                        this.isSubmitting = false;
                    }
                }
            }
        }
    </script>
</x-app-layout> 