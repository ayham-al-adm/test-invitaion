<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EMailController;
use App\Http\Controllers\InvitationController;
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
Route::get('/invitations/accept/{invitation}', [AttendanceController::class, 'create']);
Route::resource('invitations', InvitationController::class);
Route::resource('attendances', AttendanceController::class);


Route::get('email', [EMailController::class, 'store']);
