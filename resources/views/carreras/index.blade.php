@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Carreras</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('carreras.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva
            Carrera</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Código</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr>
                        <td class="border px-4 py-2">{{ $carrera->id }}</td>
                        <td class="border px-4 py-2">{{ $carrera->nombre }}</td>
                        <td class="border px-4 py-2">{{ $carrera->codigo }}</td>
                        <td class="border px-4 py-2">{{ $carrera->descripcion }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('carreras.edit', $carrera) }}"
                                class="bg-yellow-400 px-2 py-1 rounded">Editar</a>
                            <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('¿Eliminar carrera?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-2 py-1 text-white rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $carreras->links() }}
        </div>
    </div>
@endsection
