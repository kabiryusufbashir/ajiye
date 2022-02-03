<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [LoginController::class, 'index'])->name('front.index');

//Set Up
Route::post('/setup', [LoginController::class, 'setupsystem'])->name('setup-system');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:web');

//Profile
Route::get('/profile/{profile}/edit', [DashboardController::class, 'edit'])->name('admin.profile.edit')->middleware('auth:web');
Route::patch('/profile/{profile}/update', [DashboardController::class, 'update'])->name('admin.profile.update')->middleware('auth:web');
Route::get('/profile/{profile}/change-password', [DashboardController::class, 'changePassword'])->name('admin.profile.change-password')->middleware('auth:web');
Route::patch('/profile/{profile}/change-password', [DashboardController::class, 'passwordUpdate'])->name('admin.profile.passwordUpdate')->middleware('auth:web');
