<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Constructor para asegurar que solo el admin pueda acceder
    public function __construct()
    {
        $this->middleware('role:admin'); // Usando Spatie para el middleware de roles
    }

    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('admin.users.create');
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user', // Asignación de rol por defecto
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente');
    }

    // Mostrar el formulario para editar un usuario
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar un usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role ?? $user->role, // Mantener el rol si no se actualiza
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
