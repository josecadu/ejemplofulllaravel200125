@extends('plantillas.base')
@section('titulo')
Editar Departamento
@endsection()
@section('cabecera')
Editar departamento
@endsection()
@section('contenido')
<div class="w-1/2 mx-auto p-4 rounded-xl shadow-xl bg-gray-100">
    <form action="{{route('departaments.update', $departament)}}" method="POST">
        @csrf
        @method('put')
        <h2 class="text-2xl font-semibold mb-4 text-center">Formulario</h2>

        <!-- Campo Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" value="{{@old('nombre', $departament->nombre)}}" 
            id="nombre" name="nombre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nombre departament...">
            <x-error for="nombre" />
        </div>

        <!-- Campo Color -->
        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="color" id="color" value="{{@old('color', $departament->color)}}" 
            name="color" class="mt-1 block w-full border-none rounded-md p-2">
            <x-error for="color" />
        </div>

        <!-- Botones -->
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Enviar</button>
            <button type="reset" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">Reset</button>
            <a href="{{route('departaments.index')}}" class="p-2 rounded text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-red-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection()