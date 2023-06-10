<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/task/new', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/task/createAction', [TaskController::class, 'createAction'])->name('tasks.createAction');

    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/editAction', [TaskController::class, 'editAction'])->name('tasks.editAction');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/task', [TaskController::class, 'index'])->name('task.view');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('user.loginAction');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction'])->name('user.registerAction');





