@extends('plantillas.base')
@section('titulo')
Inicio Humanos
@endsection()
@section('cabecera')
Gestion Empleados
@endsection()
@section('contenido')


<div class="p-2 w-full mx-auto">
    <div class="mb-4">
        <a href="{{route('humans.create')}}" class="mb-4 p-2 rounded-xl text-white bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-user-plus mr-2"></i>NUEVO
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Departamento
                </th>
                <th scope="col" class="px-6 py-3">
                    Roles
                </th>
                <th scope="col" class="px-6 py-3">
                    Activo
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{Storage::url($item->logo)}}" alt="{{$item->username}}">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$item->username}}</div>
                        <div class="font-normal text-gray-500">{{$item->email}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    <div class="p-1 rounded-xl w-full text-center font-bold text-white bg-[{{$item->departament->color}}]">
                        {{$item->departament->nombre}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <ul>
                        @foreach($item->roles as $rol)
                        <li class="p-1 rounded bg-[{{$rol->color}}] text-center w-32 text-white italic mt-1">#{{$rol->nombre}}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="px-6 py-4">
                    <p @class([ 'p-1 rounded-xl font-bold text-white text-center' , 'bg-red-600'=>$item->activo=='NO',
                        'bg-blue-600'=>$item->activo=='SI'
                        ]) >
                        {{$item->activo}}
                    </p>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$empleados->links()}}
    </div>
</div>


@endsection()