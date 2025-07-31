<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function index(): View
    {
        $tasks = auth()->user()->tasks()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:baja,media,alta',
            'status' => 'required|in:pendiente,en_progreso,completada',
            'due_date' => 'nullable|date|after_or_equal:today',
        ]);

        $validated['user_id'] = auth()->id();

        Task::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea creada exitosamente.'
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada exitosamente.');
    }


    public function show(Task $task): View
    {
        // Verificar que la tarea pertenece al usuario
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('tasks.show', compact('task'));
    }


    public function edit(Task $task): View
    {
        // Verificar que la tarea pertenece al usuario
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): JsonResponse|RedirectResponse
    {
        // Verificar que la tarea pertenece al usuario
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:baja,media,alta',
            'status' => 'required|in:pendiente,en_progreso,completada',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea actualizada exitosamente.'
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task): JsonResponse|RedirectResponse
    {
        // Verificar que la tarea pertenece al usuario
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Tarea eliminada exitosamente.'
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada exitosamente.');
    }

    /**
     * Cambiar el estado de una tarea
     */
    public function toggleStatus(Request $request, Task $task): JsonResponse|RedirectResponse
    {
        // Verificar que la tarea pertenece al usuario
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->update([
            'status' => $task->status === 'completada' ? 'pendiente' : 'completada'
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Estado de la tarea actualizado.',
                'new_status' => $task->status
            ]);
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Estado de la tarea actualizado.');
    }
}
