@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
                    <p>{{ __("You're logged in!") }}</p>

                    {{-- Botones de gestión para Administrador --}}
                    @role('Administrador')
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-10 gap-4">
                            {{-- Usuarios --}}
                            <a href="{{ route('admin.users.index') }}"
                                class="block px-4 py-3 bg-blue-600 text-white rounded shadow hover:bg-blue-700 text-center font-medium">
                                Gestionar Usuarios
                            </a>

                            {{-- Roles --}}
                            <a href="{{ route('admin.roles.index') }}"
                                class="block px-4 py-3 bg-green-600 text-white rounded shadow hover:bg-green-700 text-center font-medium">
                                Gestionar Roles
                            </a>

                            {{-- Permisos --}}
                            <a href="{{ route('admin.permissions.index') }}"
                                class="block px-4 py-3 bg-yellow-600 text-white rounded shadow hover:bg-yellow-700 text-center font-medium">
                                Gestionar Permisos
                            </a>

                            {{-- Carreras --}}
                            <a href="{{ route('carreras.index') }}"
                                class="block px-4 py-3 bg-purple-600 text-white rounded shadow hover:bg-purple-700 text-center font-medium">
                                Gestionar Carreras
                            </a>

                            {{-- Niveles --}}
                            <a href="{{ route('niveles.index') }}"
                                class="block px-4 py-3 bg-pink-600 text-white rounded shadow hover:bg-pink-700 text-center font-medium">
                                Gestionar Niveles
                            </a>

                            {{-- Materias --}}
                            <a href="{{ route('materias.index') }}"
                                class="block px-4 py-3 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 text-center font-medium">
                                Gestionar Materias
                            </a>

                            {{-- Paralelos --}}
                            <a href="{{ route('paralelos.index') }}"
                                class="block px-4 py-3 bg-teal-600 text-white rounded shadow hover:bg-teal-700 text-center font-medium">
                                Gestionar Paralelos
                            </a>

                            {{-- Docentes --}}
                            <a href="{{ route('docentes.index') }}"
                                class="block px-4 py-3 bg-orange-600 text-white rounded shadow hover:bg-orange-700 text-center font-medium">
                                Gestionar Docentes
                            </a>

                            {{-- Espacios --}}
                            <a href="{{ route('espacios.index') }}"
                                class="block px-4 py-3 bg-gray-600 text-white rounded shadow hover:bg-gray-700 text-center font-medium">
                                Gestionar Espacios
                            </a>

                            {{-- Periodos Académicos --}}
                            <a href="{{ route('periodos.index') }}"
                                class="block px-4 py-3 bg-red-600 text-white rounded shadow hover:bg-red-700 text-center font-medium">
                                Gestionar Periodos
                            </a>
                        </div>
                    @endrole

                </div>
            </div>
        </div>
    </div>
@endsection
