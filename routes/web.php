<?php

use App\Http\Controllers\AuthController;
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

Route::get('/',[AuthController::class,'index'])->name('index');
Route::get('register',[AuthController::class,'regist_page']);
Route::group(['prefix'=>'auth','as'=>'auth.'],function(){
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
Route::group(['prefix'=>'admin','middleware'=>'checkAuth','as'=>'admin.'],function(){
    Route::get('/',[AuthController::class,'dashboard'])->name('dashboard');
});
Route::group(['middleware'=>'checkAuth'],function(){
    Route::get('/profile',function(){
        echo "Profil";
    });
});
