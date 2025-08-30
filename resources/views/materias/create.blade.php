@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Nueva Materia</h1>

        <form action="{{ route('materias.store') }}" method="POST">
            @csrf

            <label class="block mb-2">Nombre</label>
            <input type="text" name="nombre" class="w-full border p-2 mb-3" value="{{ old('nombre') }}">

            <label class="block mb-2">Código</label>
            <input type="text" name="codigo" class="w-full border p-2 mb-3" value="{{ old('codigo') }}">

            <label class="block mb-2">Carrera</label>
            <select name="carrera_id" class="w-full border p-2 mb-3">
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Nivel</label>
            <select name="nivel_id" class="w-full border p-2 mb-3">
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Créditos</label>
            <input type="number" name="creditos" class="w-full border p-2 mb-3" value="{{ old('creditos', 0) }}">

            <label class="block mb-2">Tipo</label>
            <select name="tipo" class="w-full border p-2 mb-3">
                <option value="teorica">Teórica</option>
                <option value="practica">Práctica</option>
                <option value="mixta">Mixta</option>
            </select>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection
