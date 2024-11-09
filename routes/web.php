<?php

use Illuminate\Support\Facades\Auth;
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
    $students = \App\Models\Student::all();
    return view('index', compact('students'));
});

Auth::routes();


Route::middleware(['auth'])->group(function (){
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('school_years', \App\Http\Controllers\SchoolYearController::class);
    Route::resource('fees', \App\Http\Controllers\FeeController::class);
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);

    Route::resource('payments', \App\Http\Controllers\PaymentController::class);
    Route::post('payments/fee-lists', [\App\Http\Controllers\PaymentController::class, 'feeLists'])->name('payments.fee-lists');
    Route::post('payments/check-payment', [\App\Http\Controllers\PaymentController::class, 'checkPayment'])->name('payments.check-payment');
    Route::post('payments/payment-logs', [\App\Http\Controllers\PaymentController::class, 'paymentLogs'])->name('payments.payment-logs');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


