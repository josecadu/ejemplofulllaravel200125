<?php

use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('humans', HumanController::class)->except('index', 'show');
Route::get('humans/{departament_id?}', [HumanController::class, 'index'])->name('humans.index');
Route::resource('departaments', DepartamentController::class)->except('show');
Route::resource('roles', RoleController::class)->except('show');;
//Ruta para actualizar activo
Route::put('humans1/{human}', [HumanController::class, 'updateActivo'])->name('humans.editactivo');
