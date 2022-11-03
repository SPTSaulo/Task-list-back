<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks/all', 'findAll');
    Route::post('/tasks', 'create');
    Route::put('/tasks/state/{id}', 'updateTask');
});


