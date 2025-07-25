<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paralelo_id')->constrained('paralelos')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
            $table->foreignId('espacio_id')->constrained('espacios')->onDelete('cascade');
            $table->foreignId('dia_id')->constrained('dias')->onDelete('cascade');
            $table->foreignId('hora_id')->constrained('horas')->onDelete('cascade');
            $table->foreignId('periodo_academico_id')->constrained('periodos_academicos')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['activo', 'suspendido', 'finalizado'])->default('activo');
            $table->enum('modalidad', ['presencial', 'virtual', 'hibrida'])->default('presencial');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->unique(['espacio_id', 'dia_id', 'hora_id', 'periodo_academico_id'], 'unique_horario');
            $table->index(['docente_id', 'periodo_academico_id'], 'idx_docente_periodo');
            $table->index(['paralelo_id', 'periodo_academico_id'], 'idx_paralelo_periodo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
