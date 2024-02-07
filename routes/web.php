<?php
//
//use App\Http\Controllers\EmployeeController;
//use App\Http\Controllers\PostController;
//use App\Http\Controllers\ProgrammingLanguageController;
//use App\Http\Controllers\ProjectController;
//use App\Http\Controllers\RoleController;
//use App\Http\Controllers\TaskController;
//use App\Http\Controllers\UserController;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return ['Laravel' => app()->version()];
//});
//
//require __DIR__.'/auth.php';
//
//Route::resource('employees',EmployeeController::class);
//
//Route::resource('projects',ProjectController::class);
//
//Route::resource('tasks',TaskController::class);
//
//Route::resource('programmingLanguages',ProgrammingLanguageController::class);
//
//Route::resource('roles',RoleController::class);
//
//Route::resource('users',UserController::class);
//
//
//Route::get('users/export', [UserController::class, 'export'])->name('users.export');
//Route::post('users/import', [UserController::class, 'import'])->name('users.import');
//
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::get('/', function () {
//    return view('home');
//});
//
//Route::get('/sendEmail',function (){
//    \Illuminate\Support\Facades\Mail::to('asmanq08@gmail.com')
//        ->send(new \App\Mail\TestEmail(['title'=>'test change data']));
//
//    return '<h1>Email sent successfully</h1>';
//});
//
//
//

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CustomNotificationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
@ -14,27 +15,48 @@
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    return ['Laravel' => app()->version()];
});

Route::get('/', [PostController::class,'index'])
    ->name('posts');

//Route::get('/posts', [PostController::class,'index']);
Route::get('/posts', [EmployeeController::class,'index']);
require __DIR__.'/auth.php';

Route::resource('employees',EmployeeController::class);

Route::resource('projects',ProjectController::class);

Route::get('tasks/export', [TaskController::class, 'export'])->name('tasks.export');
Route::post('tasks/import', [TaskController::class, 'import'])->name('tasks.import');

Route::resource('tasks',TaskController::class);

Route::resource('programmingLanguages',ProgrammingLanguageController::class);

Route::resource('roles',RoleController::class);



Route::get('users/export', [UserController::class, 'export'])->name('users.export');
Route::post('users/import', [UserController::class, 'import'])->name('users.import');

Route::resource('users',UserController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/sendEmail',function (){
    \Illuminate\Support\Facades\Mail::to('asmanq08@gmail.com')
        ->send(new \App\Mail\TestEmail(['title'=>'test change data']));

    return '<h1>Email sent successfully</h1>';
});
Route::middleware('auth')->group(function () {


    Route::get('fcm_token', [CustomNotificationController::class, 'fcm_token'])
        ->name('fcm_token');
    Route::get('resend/custom-notifications/{id}',
        [CustomNotificationController::class, 'resend'])
        ->name('custom-notifications.resend');
    Route::resource('custom-notifications', CustomNotificationController::class);
});



Route::get('/ajax-request', [AjaxController::class]);
