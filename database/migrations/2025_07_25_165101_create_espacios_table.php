<?php

// database/migrations/xxxx_xx_xx_create_espacios_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaciosTable extends Migration
{
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('nombre', 100);
            $table->enum('tipo', ['aula', 'laboratorio', 'cancha', 'aula interactiva', 'otro'])->default('aula');
            $table->string('ubicacion', 255)->nullable();
            $table->boolean('disponible')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('espacios');
    }
}
