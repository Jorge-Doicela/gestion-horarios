@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Roles</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.roles.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700">Crear Rol</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Permisos</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                        <td class="border px-4 py-2">
                            @foreach ($role->permissions as $perm)
                                <span
                                    class="inline-block bg-gray-200 px-2 py-1 rounded text-sm mr-1">{{ $perm->name }}</span>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.roles.edit', $role) }}"
                                class="text-blue-600 hover:underline mr-2">Editar</a>

                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Eliminar rol?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
