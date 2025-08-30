@csrf
<div class="mb-2">
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $docente->nombre ?? '') }}" class="border p-1 w-full">
</div>
<div class="mb-2">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $docente->email ?? '') }}" class="border p-1 w-full">
</div>
<div class="mb-2">
    <label>Titulo</label>
    <input type="text" name="titulo" value="{{ old('titulo', $docente->titulo ?? '') }}" class="border p-1 w-full">
</div>
<div class="mb-2">
    <label>Especialidad</label>
    <input type="text" name="especialidad" value="{{ old('especialidad', $docente->especialidad ?? '') }}"
        class="border p-1 w-full">
</div>
<div class="mb-2">
    <label>Materias</label>
    <select name="materias[]" multiple class="border p-1 w-full">
        @foreach ($materias as $materia)
            <option value="{{ $materia->id }}"
                {{ isset($materiasSeleccionadas) && in_array($materia->id, $materiasSeleccionadas) ? 'selected' : '' }}>
                {{ $materia->nombre }}
            </option>
        @endforeach
    </select>
</div>
<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
