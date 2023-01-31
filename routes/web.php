<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\TaskMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('task', [TaskController::class, 'index'])->name('task_index');
    Route::get('task/show/{id}', [TaskController::class, 'show'])->name('task_show');
    Route::post('task', [TaskController::class, 'post']);
    Route::get('task/add', [TaskController::class, 'add'])->name('task_add');
    Route::post('task/add', [TaskController::class, 'create']);
    Route::get('task/edit/{id}', [TaskController::class, 'edit'])->name('task_edit');
    Route::post('task/edit', [TaskController::class, 'update']);
    Route::get('task/delete/{id}', [TaskController::class, 'delete'])->name('task_delete');
    Route::post('task/delete',  [TaskController::class, 'remove']);
    Route::get('task/find', [TaskController::class, 'find'])->name('task_find');
    Route::post('task/find', [TaskController::class, 'search']);
});

require __DIR__.'/auth.php';
