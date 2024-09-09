<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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


Route::group(['middleware'=> 'superadmin'],function(){

});

Route::group(['middleware'=> 'admin'],function(){

});

Route::group(['middleware'=> 'user'],function(){

});