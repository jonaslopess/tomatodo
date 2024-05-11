<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/task/create', [TaskController::class, 'create']);
Route::get('/task/read', [TaskController::class, 'read']);
Route::get('/task/read_all', [TaskController::class, 'read_all']);
Route::get('/task/update', [TaskController::class, 'update']);
Route::get('/task/delete', [TaskController::class, 'delete']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout']);
