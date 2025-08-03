<?php

// database/migrations/xxxx_xx_xx_create_paralelos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalelosTable extends Migration
{
    public function up()
    {
        Schema::create('paralelos', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('nombre', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paralelos');
    }
}
