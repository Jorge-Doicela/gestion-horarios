<?php

// database/migrations/xxxx_xx_xx_create_docentes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('nombre', 100);
            $table->string('email', 100)->nullable();
            $table->string('titulo', 100)->nullable();
            $table->string('especialidad', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
