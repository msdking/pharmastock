<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/index', function () {
    return view('index');
});

Route::get('/dbconn', function () {
    return view('dbconn');
});
Route::get('/header', function () {
    return view('header');
});
 //
//hada bach ki dir localhost/login tetl3lk page login kima f localhost/login.php hna khes hta dir hed route bch tle3

