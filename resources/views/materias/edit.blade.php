@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Materia</h1>

        <form action="{{ route('materias.update', $materia) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Nombre</label>
            <input type="text" name="nombre" class="w-full border p-2 mb-3" value="{{ old('nombre', $materia->nombre) }}">

            <label class="block mb-2">Código</label>
            <input type="text" name="codigo" class="w-full border p-2 mb-3"
                value="{{ old('codigo', $materia->codigo) }}">

            <label class="block mb-2">Carrera</label>
            <select name="carrera_id" class="w-full border p-2 mb-3">
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $carrera->id == $materia->carrera_id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>

            <label class="block mb-2">Nivel</label>
            <select name="nivel_id" class="w-full border p-2 mb-3">
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id }}" {{ $nivel->id == $materia->nivel_id ? 'selected' : '' }}>
                        {{ $nivel->nombre }}
                    </option>
                @endforeach
            </select>

            <label class="block mb-2">Créditos</label>
            <input type="number" name="creditos" class="w-full border p-2 mb-3"
                value="{{ old('creditos', $materia->creditos) }}">

            <label class="block mb-2">Tipo</label>
            <select name="tipo" class="w-full border p-2 mb-3">
                <option value="teorica" {{ $materia->tipo == 'teorica' ? 'selected' : '' }}>Teórica</option>
                <option value="practica" {{ $materia->tipo == 'practica' ? 'selected' : '' }}>Práctica</option>
                <option value="mixta" {{ $materia->tipo == 'mixta' ? 'selected' : '' }}>Mixta</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
@endsection
