<?php

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
    return view('home');
});


Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    });

    Route::get('/add', function () {
        return view('product.add');
    });

    Route::get('/{id?}', function (int $id = 123) {
        return "ID: $id";
    });
});

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

Route::get('/user', function () {
    return view('user.user_list');
});

Route::get('user/{id}', function(int $id){
    return "ID: " . $id;
});

Route::fallback(function () {
    return response()
        ->view('error.404', [], 404);
});