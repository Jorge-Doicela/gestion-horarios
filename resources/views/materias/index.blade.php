@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Materias</h1>

        <a href="{{ route('materias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Nueva Materia</a>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">Código</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Carrera</th>
                    <th class="p-2">Nivel</th>
                    <th class="p-2">Créditos</th>
                    <th class="p-2">Tipo</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                    <tr class="border-t">
                        <td class="p-2">{{ $materia->codigo }}</td>
                        <td class="p-2">{{ $materia->nombre }}</td>
                        <td class="p-2">{{ $materia->carrera->nombre }}</td>
                        <td class="p-2">{{ $materia->nivel->nombre }}</td>
                        <td class="p-2">{{ $materia->creditos }}</td>
                        <td class="p-2 capitalize">{{ $materia->tipo }}</td>
                        <td class="p-2">
                            <a href="{{ route('materias.edit', $materia) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 ml-2"
                                    onclick="return confirm('¿Seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $materias->links() }}
        </div>
    </div>
@endsection
