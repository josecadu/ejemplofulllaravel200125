<?php

use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('humans', HumanController::class);
Route::resource('departaments', DepartamentController::class);
Route::resource('roles', RoleController::class);
