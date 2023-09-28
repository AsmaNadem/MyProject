<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\ProgrammingLanguage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', [PostController::class,'index'])
//    ->name('posts');

//Route::get('/posts', [PostController::class,'index']);
Route::get('/posts', [EmployeeController::class,'index']);

Route::resource('employees',EmployeeController::class);
Route::resource('projects',ProjectController::class);
Route::resource('tasks',TaskController::class);
Route::resource('programmingLanguages',ProgrammingLanguageController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
