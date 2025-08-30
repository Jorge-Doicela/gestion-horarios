@extends('layouts.app')
@section('content')
    <h1>Editar Docente</h1>
    <form action="{{ route('docentes.update', $docente) }}" method="POST">
        @method('PUT')
        @include('docentes.form')
    </form>
@endsection
