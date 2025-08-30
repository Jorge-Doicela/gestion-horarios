@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo
            Docente</a>

        @if (session('success'))
            <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">Nombre</th>
                    <th class="border px-2 py-1">Email</th>
                    <th class="border px-2 py-1">Titulo</th>
                    <th class="border px-2 py-1">Especialidad</th>
                    <th class="border px-2 py-1">Materias</th>
                    <th class="border px-2 py-1">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
                    <tr>
                        <td class="border px-2 py-1">{{ $docente->nombre }}</td>
                        <td class="border px-2 py-1">{{ $docente->email }}</td>
                        <td class="border px-2 py-1">{{ $docente->titulo }}</td>
                        <td class="border px-2 py-1">{{ $docente->especialidad }}</td>
                        <td class="border px-2 py-1">{{ $docente->materias->pluck('nombre')->join(', ') }}</td>
                        <td class="border px-2 py-1">
                            <a href="{{ route('docentes.edit', $docente) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $docentes->links() }}
    </div>
@endsection
