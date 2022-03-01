<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\APIController;


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

//Set Up/Login
Route::get('/admin', [LoginController::class, 'adminlogin'])->name('admin-login');
Route::post('/setup', [LoginController::class, 'setupsystem'])->name('setup-system');
Route::post('/adminlogin', [LoginController::class, 'loginadmin'])->name('log-in-admin');
Route::post('/clientlogin', [LoginController::class, 'loginclient'])->name('log-in-client');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-admin')->middleware('auth:web');

    //Profile
    Route::get('/profile/{profile}/edit', [DashboardController::class, 'edit'])->name('admin.profile.edit')->middleware('auth:web');
    Route::patch('/profile/{profile}/update', [DashboardController::class, 'update'])->name('admin.profile.update')->middleware('auth:web');
    Route::get('/profile/{profile}/change-password', [DashboardController::class, 'changePassword'])->name('admin.profile.change-password')->middleware('auth:web');
    Route::patch('/profile/{profile}/change-password', [DashboardController::class, 'passwordUpdate'])->name('admin.profile.passwordUpdate')->middleware('auth:web');

    //Client
    Route::post('/client-create', [DashboardController::class, 'clientcreate'])->name('client-create')->middleware('auth:web');


//Client
Route::get('/home', [ClientController::class, 'index'])->name('dashboard-client')->middleware('auth:staff');
Route::post('/addaccount', [ClientController::class, 'addaccount'])->name('client-add-account')->middleware('auth:staff');
Route::post('/addsubaccount', [ClientController::class, 'addsubaccount'])->name('client-add-sub-account')->middleware('auth:staff');
Route::post('/addrecord', [ClientController::class, 'addrecord'])->name('client-add-record')->middleware('auth:staff');
Route::post('/addimprest', [ClientController::class, 'addimprest'])->name('client-add-imprest')->middleware('auth:staff');
Route::post('/viewreport', [ClientController::class, 'viewreport'])->name('client-view-report')->middleware('auth:staff');
Route::post('/addstaff', [ClientController::class, 'addstaff'])->name('client-add-staff')->middleware('auth:staff');
Route::patch('/editprofile', [ClientController::class, 'editprofile'])->name('client-edit-profile')->middleware('auth:staff');
Route::post('/logout-client', [ClientController::class, 'logout'])->name('logout-client');

//Received
Route::delete('/received/{recieved}', [ClientController::class, 'deletereceived'])->name('client-delete-received')->middleware('auth:staff');

//Reports
Route::delete('/report/{report}', [ClientController::class, 'deletereport'])->name('client-delete-report')->middleware('auth:staff');
    
    // API 
    Route::get('/api/getAccount', [APIController::class, 'getAccount']);
    Route::get('/api/getSubaccount', [APIController::class, 'getSubaccount']);
    Route::get('/api/getMonth', [APIController::class, 'getmonth']);
    Route::get('/api/getYear', [APIController::class, 'getYear']);
