<?php

use App\Http\Controllers\API\PendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'pendidikan','as'=>'pendidikan.'],function(){
    Route::get('/',[PendidikanController::class, 'index'])->name('index');
    Route::post('/store',[PendidikanController::class, 'store'])->name('store'); 
    Route::delete('/delete/{id}',[PendidikanController::class, 'destroy'])->name('delete'); 
    Route::put('/update/{id}',[PendidikanController::class, 'update'])->name('update');
});
