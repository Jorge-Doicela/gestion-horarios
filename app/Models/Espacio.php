<?php

// app/Models/Espacio.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'ubicacion', 'disponible'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
