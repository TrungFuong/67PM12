<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
    return view('home');
});


//Route::prefix('product')->group(function () {
    //Route::get('/', [ProductController::class, 'index']);
    //Route::get('/add', [ProductController::class, 'add']);
    //Route::get('detail/{id?}', [ProductController::class, 'getDetail']);
//});

Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'create')->name('add');
        Route::get('detail/{id?}', 'getDetail');
        Route::post('/store', 'store')->name('store'); 
        });
});

Route::get('login', [AuthController::class, 'login']);
Route::post('checklogin', [AuthController::class, 'checkLogin']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register-action', [AuthController::class, 'registerAction']);

Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'Luong Xuan Hieu',
    $mssv = "123456"
) {
    return "Name: " . $name . " MSSV: " . $mssv;
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

Route::get('/test', function () {
    return response()->json(['message' => 'HIHIHIHIHI']);
});

Route::get('/user', [UserController::class, 'index']);

Route::get('user/{id}', function(int $id){
    return "ID: " . $id;
});

Route::fallback(function () {
    return response()
        ->view('error.404', [], 404);
});