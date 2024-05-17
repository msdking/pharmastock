<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->middleware('auth');

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/tables-data', function () {
    return view('tables-data');
});

Route::get('/tables-general', function () {
    return view('tables-general');
})->name('tables-general');

Route::get('/user-profile', function () {
    return view('user-profile');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/tables-data', [AuthController::class, 'store'])->name('tables-data');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/inscription', [AuthController::class, 'create'])->name('inscription');

Route::post('/index', [AuthController::class, 'store'])->name('index');

Route::post('/tables-data', [AuthController::class, 'cree'])->name('tables-data');

Route::get('/tables-general', [AuthController::class, 'index'])->name('tables-general');

Route::put('/update', [AuthController::class, 'update'])->name('update');

Route::delete('/tables-general/{type}/{id}', [AuthController::class, 'destroy'])->name('tables-general.destroy');

Route::get('/tables-general/{type}/edit', [AuthController::class, 'edit'])->name('tables-general.edit');

Route::put('/tables-general/{type}/update', [AuthController::class, 'update'])->name('tables-general.update');


