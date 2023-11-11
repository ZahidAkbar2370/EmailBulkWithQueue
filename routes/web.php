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
    return redirect('login');
});

Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, "index"])->name('home');

Route::get('/users', [App\Http\Controllers\Backend\UserController::class, "index"]);
Route::get('/add-user', [App\Http\Controllers\Backend\UserController::class, "create"]);
Route::post('/save-user', [App\Http\Controllers\Backend\UserController::class, "store"]);
Route::get('/delete-user/{id}', [App\Http\Controllers\Backend\UserController::class, "destroy"]);

Route::get('/emails', [App\Http\Controllers\Backend\EmailController::class, "index"]);
Route::get('/delete-email/{id}', [App\Http\Controllers\Backend\EmailController::class, "destroy"]);
Route::get('/compose', [App\Http\Controllers\Backend\EmailController::class, "create"]);
Route::post('/send-email', [App\Http\Controllers\Backend\EmailController::class, "sendEmail"]);
Route::get('/sent-history', [App\Http\Controllers\Backend\EmailController::class, "sendHistory"]);
Route::get('/update-email-status/{id}/{status}', [App\Http\Controllers\Backend\EmailController::class, "updateEmailStatus"]);
Route::post('/process-email-csv', [App\Http\Controllers\Backend\EmailController::class, "processEmailCSV"]);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
