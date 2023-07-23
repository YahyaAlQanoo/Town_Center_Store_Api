<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PointsController;
use App\Http\Controllers\Admin\ProductChildController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Mail\AdminResetPasswordEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
    Mail::to("yalqano@smail.ucas.edu.ps")->send(new AdminResetPasswordEmail("30252825"));
});

Route::get('/login', [AuthController::class, 'showlogin'])->name('login')->middleware('guest:admin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest:admin');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth:admin');

Route::resource('category',CategoryController::class)->middleware('auth:admin');
Route::resource('products',ProductController::class)->middleware('auth:admin');
Route::resource('products_child',ProductChildController::class)->middleware('auth:admin');
Route::resource('orders',OrdersController::class)->middleware('auth:admin');
Route::resource('users',UsersController::class)->middleware('auth:admin');
Route::resource('points',PointsController::class)->middleware('auth:admin');
Route::resource('notifications',NotificationController::class)->middleware('auth:admin');







    // Route::get
    
 
 