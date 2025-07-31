<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority', ['baja', 'media', 'alta'])->default('baja');
            $table->enum('status', ['pendiente', 'en_progreso', 'completada'])->default('pendiente');
            $table->date('due_date')->nullable();
            $table->timestamps();
            
            // Crear índice en lugar de foreign key
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
