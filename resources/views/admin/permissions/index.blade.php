@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Permisos</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.permissions.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700">Crear Permiso</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="border px-4 py-2">{{ $permission->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.permissions.edit', $permission) }}"
                                class="text-blue-600 hover:underline mr-2">Editar</a>

                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST"
                                class="inline" onsubmit="return confirm('¿Eliminar permiso?')">
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
            {{ $permissions->links() }}
        </div>
    </div>
@endsection
