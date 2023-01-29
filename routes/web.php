<?php

use App\Http\Controllers\ProfileController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('task', 'App\Http\Controllers\TaskController@index');
Route::get('task/show', 'App\Http\Controllers\TaskController@show');
Route::post('task', 'App\Http\Controllers\TaskController@post');
Route::get('task/add', 'App\Http\Controllers\TaskController@add');
Route::post('task/add', 'App\Http\Controllers\TaskController@create');
Route::get('task/edit', 'App\Http\Controllers\TaskController@edit');
Route::post('task/edit', 'App\Http\Controllers\TaskController@update');
Route::get('task/del', 'App\Http\Controllers\TaskController@del');
Route::post('task/del', 'App\Http\Controllers\TaskController@remove');

require __DIR__.'/auth.php';
