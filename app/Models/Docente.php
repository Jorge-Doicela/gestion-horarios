<?php

// app/Models/Docente.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'titulo',
        'especialidad',
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
