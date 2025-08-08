@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña (opcional)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="role">Rol</label>
                <select class="form-control" id="role" name="role">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
@endsection
