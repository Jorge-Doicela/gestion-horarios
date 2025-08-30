<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EspacioController;
use App\Http\Controllers\PeriodoAcademicoController; // <- añadido
use Illuminate\Support\Facades\Route;

// Ruta pública inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard solo para usuarios autenticados y verificados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para administración (Usuarios, Roles, Permisos)
Route::middleware(['auth', 'role:Administrador'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });

// Rutas de carreras y niveles (fuera del prefijo admin, pero con rol 'Administrador')
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::resource('carreras', CarreraController::class);

    // Corregimos el parámetro singular para Nivel
    Route::resource('niveles', NivelController::class)->parameters([
        'niveles' => 'nivel'
    ]);
});

// Rutas de materias, paralelos, docentes y espacios (solo usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::resource('materias', MateriaController::class);
    Route::resource('paralelos', ParaleloController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('espacios', EspacioController::class);
    Route::resource('periodos', PeriodoAcademicoController::class); // <- añadido
});

// Rutas de autenticación (Laravel Breeze)
require __DIR__ . '/auth.php';
