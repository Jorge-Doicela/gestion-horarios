<?php

// database/migrations/xxxx_xx_xx_create_materias_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('nombre', 100);
            $table->string('codigo', 20)->unique();
            $table->foreignId('carrera_id')->constrained()->onDelete('cascade');
            $table->foreignId('nivel_id')->constrained()->onDelete('cascade');
            $table->integer('creditos')->default(0);
            $table->enum('tipo', ['teorica', 'practica', 'mixta'])->default('teorica');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
