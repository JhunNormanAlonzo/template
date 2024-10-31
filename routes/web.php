<?php

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

Auth::routes();

Route::resource('students', \App\Http\Controllers\StudentController::class);
Route::resource('school_years', \App\Http\Controllers\SchoolYearController::class);
Route::resource('fees', \App\Http\Controllers\FeeController::class);
Route::resource('courses', \App\Http\Controllers\CourseController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
