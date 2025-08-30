@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Nueva Carrera</h1>

        <form action="{{ route('carreras.store') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border px-2 py-1 rounded">
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo') }}" class="w-full border px-2 py-1 rounded">
                @error('codigo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1">Descripción</label>
                <textarea name="descripcion" class="w-full border px-2 py-1 rounded">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('carreras.index') }}" class="ml-2 px-4 py-2 rounded border">Cancelar</a>
        </form>
    </div>
@endsection
