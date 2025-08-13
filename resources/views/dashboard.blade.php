@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
                    <p>{{ __("You're logged in!") }}</p>

                    {{-- Botón para ir a la gestión de usuarios (solo para Administrador) --}}
                    @role('Administrador')
                        <div class="mt-4 space-x-4">
                            <a href="{{ route('admin.users.index') }}"
                                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Gestionar Usuarios
                            </a>
                            <a href="{{ route('admin.roles.index') }}"
                                class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Gestionar Roles
                            </a>
                            <a href="{{ route('admin.permissions.index') }}"
                                class="inline-block px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
                                Gestionar Permisos
                            </a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
