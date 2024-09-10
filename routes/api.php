<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tasks', [TasksController::class, 'index']);
    Route::get('/tasks/{id}', [TasksController::class, 'show']);
    Route::post('/tasks', [TasksController::class, 'store']);
    Route::put('/tasks/{id}', [TasksController::class, 'update']);
    Route::delete('/tasks/{id}', [TasksController::class, 'destroy']);
});
//Route::get('/tasks', [TasksController::class, 'index']);
//Route::get('/tasks/{id}', [TasksController::class, 'show']);
//Route::post('/tasks', [TasksController::class, 'store']);
//Route::put('/tasks/{id}', [TasksController::class, 'update']);
//Route::delete('/tasks/{id}', [TasksController::class, 'destroy']);
