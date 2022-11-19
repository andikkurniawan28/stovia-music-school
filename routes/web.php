<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\InstrumentController;

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::get('/roles', RoleController::class)->name('roles')->middleware('auth');
Route::get('/logs', LogController::class)->name('logs')->middleware('auth');
Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/instruments', InstrumentController::class)->middleware('auth');
Route::resource('/grades', GradeController::class)->middleware('auth');
Route::resource('/courses', CourseController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginAttempt', [LoginController::class, 'loginAttempt'])->name('loginAttempt');
Route::get('/logout', LogoutController::class)->name('logout');
