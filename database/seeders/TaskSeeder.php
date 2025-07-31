<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            $this->command->error('No se encontró ningún usuario. Ejecuta primero el DatabaseSeeder.');
            return;
        }

        $tasks = [
            [
                'title' => 'Completar proyecto Laravel',
                'description' => 'Finalizar el sistema de gestión de tareas con todas las funcionalidades CRUD implementadas',
                'priority' => 'alta',
                'status' => 'en_progreso',
                'due_date' => now()->addDays(7),
            ],
            [
                'title' => 'Estudiar para el examen',
                'description' => 'Repasar los temas de Laravel MVC, Eloquent ORM y arquitectura de aplicaciones web',
                'priority' => 'media',
                'status' => 'pendiente',
                'due_date' => now()->addDays(3),
            ],
            [
                'title' => 'Hacer ejercicio',
                'description' => 'Ir al gimnasio y hacer cardio por 30 minutos',
                'priority' => 'baja',
                'status' => 'completada',
                'due_date' => now()->subDays(1),
            ],
            [
                'title' => 'Leer documentación de Tailwind CSS',
                'description' => 'Estudiar las clases de utilidad y componentes de Tailwind CSS para mejorar el diseño',
                'priority' => 'media',
                'status' => 'pendiente',
                'due_date' => now()->addDays(5),
            ],
            [
                'title' => 'Preparar presentación del proyecto',
                'description' => 'Crear slides para presentar el sistema de gestión de tareas en clase',
                'priority' => 'alta',
                'status' => 'pendiente',
                'due_date' => now()->addDays(10),
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create([
                'user_id' => $user->id,
                ...$taskData,
            ]);
        }

        $this->command->info('Tareas de ejemplo creadas exitosamente.');
    }
}
