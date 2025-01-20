@extends('plantillas.base')
@section('titulo')
Crear Usuario
@endsection()
@section('cabecera')
Crear Usuario
@endsection()
@section('contenido')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Formulario de Registro de Usuario</h2>

    <form action="{{route('humans.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Campo de nombre de usuario -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
            <input type="text" id="username" value="{{@old('username')}}" 
            name="username" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            <x-error for="username" />
        </div>

        <!-- Campo de correo electrónico -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{@old('email')}}"
            class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            <x-error for="email" />
        </div>

        <!-- Radiobuttons para activo -->
        <div class="mb-4">
            <span class="block text-sm font-medium text-gray-700">¿Activo?</span>
            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="activo" value="SI" @checked(old('activo')=='SI') 
                    class="form-radio h-4 w-4 text-indigo-600">
                    <span>SI</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="activo" value="NO" @checked(old('activo')=='NO') 
                    class="form-radio h-4 w-4 text-indigo-600">
                    <span>NO</span>
                </label>
            </div>
        </div>
        <x-error for="activo" />

        <!-- Select para departamento -->
        <div class="mb-4">
            <label for="departament_id" class="block text-sm font-medium text-gray-700">Departamento</label>
            <select id="departament_id" name="departament_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione un departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @selected(old('departament_id')==$departamento->id)>{{$departamento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <x-error for="departament_id" />

        <!-- Checkboxs para roles -->
        <div class="mb-4">
            <span class="block text-sm font-medium text-gray-700">Roles</span>
            <div class="flex items-center space-x-6">
                @foreach ($roles as $rol)
                <label class="flex items-center space-x-2 italic" for={{$rol->id}}>
                    <input id="{{$rol->id}}" type="checkbox" name="role_id[]" value="{{$rol->id}}" class="form-checkbox h-4 w-4 text-indigo-600">
                    <span>#{{$rol->nombre}}</span>
                </label>
                @endforeach
            </div>
        </div>
        <x-error for="role_id" />

        <!-- Campo para subir logo -->
        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700">Subir Logo</label>
            <div class="flex items-center">
                <input type="file" id="logo" name="logo" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" accept="image/*" oninput="preview.src=window.URL.createObjectURL(this.files[0])">
                <img id="preview" src="{{Storage::url('images/imagen1.jpg')}}" alt="Vista previa" class="ml-4 w-16 h-16 object-cover">
            </div>
        </div>
        <x-error for="logo" />

        <!-- Botones -->
        <div class="flex justify-between">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Enviar</button>
            <button type="reset" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Reset</button>
            <button type="button" onclick="window.history.back()" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Cancelar</button>
        </div>
    </form>
</div>
@endsection()