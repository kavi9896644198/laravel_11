<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

Route::get('/',[HomeController::class,'index']);

// registeration
Route::get('registeration',[AuthController::class,'registeration']);
Route::post('registeration_post',[AuthController::class,'registeration_post']);
// login route
Route::get('login',[AuthController::class,'login']);
Route::post('login_post',[AuthController::class,'login_post']);
// forgot password route
Route::get('forgot',[AuthController::class,'forgot']);
Route::post('forgot_post',[AuthController::class,'forgot_post']);
Route::get('reset/{token}',[AuthController::class,'getReset']);
Route::post('reset_post/{token}',[AuthController::class,'passReset']);



Route::group(['middleware'=> 'superadmin'],function(){
	Route::get('superadmin/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware'=> 'admin'],function(){
	Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware'=> 'user'],function(){
	Route::get('user/dashboard',[DashboardController::class,'dashboard']);
});

Route::get('logout',[AuthController::class,'logout']);