<?php

use App\Events\BroadcastMessage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\UploadController;
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
Route::get('register',[AuthController::class,'regist_page'])->name('register_page');
Route::group(['prefix'=>'auth','as'=>'auth.'],function(){
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
Route::group(['prefix'=>'admin','middleware'=>'checkAuth','as'=>'admin.'],function(){
    Route::get('/',[AuthController::class,'dashboard'])->name('dashboard');
    
    Route::group(['prefix'=>'pengalaman_kerja','as'=>'pengalaman_kerja.'],function(){
        Route::get('/',[PengalamanKerjaController::class, 'index'])->name('index');
        Route::post('/store',[PengalamanKerjaController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}',[PengalamanKerjaController::class, 'destroy'])->name('delete'); 
        Route::post('/update/{id}',[PengalamanKerjaController::class, 'update'])->name('update');
    });
    Route::group(['prefix'=>'pendidikan','as'=>'pendidikan.'],function(){
        Route::get('/',[PendidikanController::class, 'index'])->name('index');
        Route::post('/store',[PendidikanController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}',[PendidikanController::class, 'destroy'])->name('delete'); 
        Route::post('/update/{id}',[PendidikanController::class, 'update'])->name('update');
    });
    
});

Route::group(['middleware'=>'checkAuth'],function(){
    Route::get('/profile',function(){
        echo "Profil";
    });
});

//Optional parameter nama
Route::get('coba/{nama?}',[CobaController::class, 'index']);

Route::get('upload',[UploadController::class, 'index']);
Route::post('upload/proses',[UploadController::class, 'proses_upload'])->name('proses_upload');
Route::get('dropzone',[DropzoneController::class, 'index']);
Route::post('dropzone/store',[DropzoneController::class, 'store'])->name('dropzone.store');
Route::post('dropzone/store/pdf',[DropzoneController::class, 'store_pdf'])->name('dropzone.store_pdf');
Route::get('pegawai/{nama}',[PegawaiController::class, 'index']);
Route::get('formulir',[FormulirController::class, 'index']);
Route::post('formulir/insert',[FormulirController::class, 'insert'])->name('formulir.insert');
Route::get('event',function(){
//    event(new BroadcastMessage('Hello World'));
$pusher = new Pusher\Pusher(
    env('PUSHER_APP_KEY'),
    env('PUSHER_APP_SECRET'),
    env('PUSHER_APP_ID'),
    array('cluster' => env('PUSHER_APP_CLUSTER'))
);

$pusher->trigger(
    'my-channel',
    'my-event',
    'Welcome'
);

return "Event has been sent";
});
Route::get('tes-event',function(){
    return view('tes-event');
});