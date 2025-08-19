<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        // Solo administradores pueden gestionar usuarios
        $this->middleware(['role:Administrador']);
    }

    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        // 🔒 Evitar editar al Administrador General (ejemplo: id=1)
        if ($user->id === 1) {
            return redirect()->route('users.index')->with('error', 'No se puede editar al Administrador General.');
        }

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // 🔒 Evitar editar al Administrador General
        if ($user->id === 1) {
            return redirect()->route('users.index')->with('error', 'No se puede modificar al Administrador General.');
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role'  => 'required|exists:roles,name',
        ]);

        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ]);

        // 🔒 Evitar que un usuario se quite su propio rol de Administrador
        if ($user->id === auth()->id() && $user->hasRole('Administrador')) {
            return redirect()->route('users.index')->with('error', 'No puedes cambiar tu propio rol de Administrador.');
        }

        $user->syncRoles([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        // 🔒 Evitar borrar al Administrador General
        if ($user->id === 1) {
            return redirect()->route('users.index')->with('error', 'No se puede eliminar al Administrador General.');
        }

        // 🔒 Evitar auto-eliminarse
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
