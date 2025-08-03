<?php

// app/Models/Paralelo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
