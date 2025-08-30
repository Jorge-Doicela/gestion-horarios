@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nuevo Paralelo</h1>

        <form action="{{ route('paralelos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="carrera_id" class="form-label">Carrera</label>
                <select name="carrera_id" class="form-control" required>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nivel_id" class="form-label">Nivel</label>
                <select name="nivel_id" class="form-control" required>
                    @foreach ($niveles as $nivel)
                        <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('paralelos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
