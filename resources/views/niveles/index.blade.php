@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Niveles Académicos</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('niveles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo
            Nivel</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveles as $nivel)
                    <tr>
                        <td class="border px-4 py-2">{{ $nivel->id }}</td>
                        <td class="border px-4 py-2">{{ $nivel->nombre }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('niveles.edit', $nivel) }}" class="bg-yellow-400 px-2 py-1 rounded">Editar</a>
                            <form action="{{ route('niveles.destroy', $nivel) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('¿Eliminar nivel?');">
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
            {{ $niveles->links() }}
        </div>
    </div>
@endsection
