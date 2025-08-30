@extends('layouts.app')
@section('content')
    <h1>Nuevo Docente</h1>
    <form action="{{ route('docentes.store') }}" method="POST">
        @include('docentes.form')
    </form>
@endsection
