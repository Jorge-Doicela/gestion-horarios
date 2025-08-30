@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Paralelos</h1>
        <a href="{{ route('paralelos.create') }}" class="btn btn-primary mb-3">Nuevo Paralelo</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paralelos as $paralelo)
                    <tr>
                        <td>{{ $paralelo->nombre }}</td>
                        <td>{{ $paralelo->carrera->nombre }}</td>
                        <td>{{ $paralelo->nivel->nombre }}</td>
                        <td>
                            <a href="{{ route('paralelos.edit', $paralelo) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('paralelos.destroy', $paralelo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar este paralelo?')"
                                    class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
