<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('tasks.index');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
    Route::patch('/tasks/{task}/status', [App\Http\Controllers\TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});
