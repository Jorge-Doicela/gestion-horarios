@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Rol: {{ $role->name }}</h1>

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.roles.update', $role) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre del rol</label>
                <input type="text" name="name" value="{{ old('name', $role->name) }}" required
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Permisos</label>
                <div class="grid grid-cols-3 gap-2 max-h-64 overflow-y-auto border rounded p-2">
                    @foreach ($permissions as $perm)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $perm->id }}"
                                {{ in_array($perm->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                class="mr-2">
                            {{ $perm->name }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
            <a href="{{ route('admin.roles.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection
