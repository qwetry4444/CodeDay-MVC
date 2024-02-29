<?php

namespace App\config;

use App\Controllers\HomeController;
use App\Controllers\NewTaskFormController;
use App\Controllers\ProfileController;
use App\Controllers\ProgressController;
use App\Controllers\RegisterController;
use App\Controllers\TaskController;
use App\Controllers\TaskListController;
use App\Controllers\LoginController;

use App\Kernel\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/newTaskForm', [NewTaskFormController::class, 'index']),
    Route::post('/newTaskForm', [NewTaskFormController::class, 'add']),
    Route::get('/profile', [ProfileController::class, 'index']),
    Route::get('/progress', [ProgressController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'register']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/logout', [LoginController::class, 'logout']),
    Route::get('/task', [TaskController::class, 'index']),
    Route::post('/task', [TaskController::class, 'show']),
    Route::get('/taskList', [TaskListController::class, 'index'])
];