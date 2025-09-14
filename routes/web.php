<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTasksController;

Route::view('/', 'welcome');

Route::resource('projects', ProjectController::class);

Route::resource('projects.tasks', ProjectTasksController::class)
  ->only(['store', 'update', 'destroy']);

Route::view('/dashboard', 'dashboard')
  ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
