<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Relación con el usuario propietario de la tarea
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope para filtrar tareas por usuario
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope para filtrar por estado
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope para filtrar por prioridad
     */
    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Obtener el color de la prioridad
     */
    public function getPriorityColorAttribute(): string
    {
        return match($this->priority) {
            'alta' => 'text-red-600 bg-red-100',
            'media' => 'text-amber-600 bg-amber-100',
            'baja' => 'text-emerald-600 bg-emerald-100',
            default => 'text-slate-600 bg-slate-100',
        };
    }

    /**
     * Obtener el color del estado
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'completada' => 'text-emerald-600 bg-emerald-100',
            'en_progreso' => 'text-indigo-600 bg-indigo-100',
            'pendiente' => 'text-slate-600 bg-slate-100',
            default => 'text-slate-600 bg-slate-100',
        };
    }
}
