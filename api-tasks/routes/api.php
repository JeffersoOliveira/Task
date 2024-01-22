<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function () {
    return \App\Models\User::all();
});

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'cadastro']);
Route::delete('/tasks/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete']);
Route::put('/tasks/atualiza/{id}', [App\Http\Controllers\TaskController::class, 'atualiza']);




