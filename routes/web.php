<?php

use App\Models\Task;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', function() {

    $tasks = Task::with('active_characters')->get();

    dd($tasks);

});

Route::group(['middleware' => 'auth:web'], function() {
    Route::resource('skill', \App\Http\Controllers\SkillController::class);
    Route::get('/task/{task}/start', [\App\Http\Controllers\TaskController::class, 'start'])->name('task.start');
    Route::get('/task/{task}/work', [\App\Http\Controllers\TaskController::class, 'work'])->name('task.work');
});
