@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Usuarios</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Crear
            Usuario</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Roles</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            @foreach ($user->roles as $role)
                                <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-sm">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 mr-2">Editar</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Está seguro de eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
