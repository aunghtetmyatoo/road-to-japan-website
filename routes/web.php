<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Information\StudentController;
use App\Http\Controllers\Information\TeacherController;

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

Route::resource('posts', PostController::class);

Route::resource('applies', ApplyController::class);

Route::resource('teachers', TeacherController::class);

Route::resource('students', StudentController::class);

#Information

Route::get('/informations', [InformationController::class, 'index']);

#Dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/', function () {
    return view('index');
});

# Comment Routes
Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');