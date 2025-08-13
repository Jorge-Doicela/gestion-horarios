@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="border p-2 w-full mb-3">
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <label class="block mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full mb-3">
            @error('email')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <label class="block mb-2">Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="border p-2 w-full mb-3">
            @error('password')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <label class="block mb-2">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="border p-2 w-full mb-3">

            <label class="block mb-2">Roles</label>
            @foreach ($roles as $role)
                <div>
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}"
                        {{ is_array(old('roles', $userRoles)) && in_array($role->name, old('roles', $userRoles)) ? 'checked' : '' }}>
                    <label for="role_{{ $role->id }}">{{ $role->name }}</label>
                </div>
            @endforeach
            @error('roles')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-4">Actualizar</button>
            <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
@endsection
