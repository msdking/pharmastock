<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\Gestionnaire;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index']);




Route::get('/listclients', function () {
    return view('listclients');
})->name('listclients');;

Route::get('/listclients', [ClientController::class, 'index'])->name('listclients');

Route::post('/addclients', [ClientController::class, 'store'])->name('clients.store');

//Route::get('/addclients', [ProductController::class, 'create'])->name('addclients.create');

Route::get('/addclients', function () {
    return view('addclients');
})->name('addclients');;


Route::get('/products', function () {
    return view('products');
})->name('products');;



Route::get('/addproducts', function () {
    return view('addproducts');
})->name('addproducts');;

Route::get('/home/all_products', function () {
    return view('all_products');
})->name('all_products');;







Route::get('/staticproducts', function () {
    return view('staticproducts');
})->name('staticproducts');;


Route::get('/daysales', function () {
    return view('daysales');
})->name('daysales');;

Route::get('/weeksales', function () {
    return view('weeksales');
})->name('weeksales');;

Route::get('/monthsales', function () {
    return view('monthsales');
})->name('monthsales');;

Route::get('/login', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index');
})->name('index');;


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile', [GestionnaireController::class, 'showProfile'])->name('profile');

Route::put('/profile', [GestionnaireController::class, 'updateProfile'])->name('profile');

Route::put('/profile', [GestionnaireController::class, 'changePassword'])->name('profile');


Route::post('/addproducts', [ProductController::class, 'store'])->name('products.store');

Route::get('/addproducts', [ProductController::class, 'create'])->name('addproducts.create');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');

//Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');

Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');


//Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/details', function () {
    return view('details');
})->name('details');


Route::get('/header', function () {
    return view('header');
})->name('header');

Route::get('/listorder', function () {
    return view('listorder');
})->name('listorder');

Route::get('/listorder', [OrderController::class, 'index'])->name('listorder');


Route::get('/pharmastock', function () {
    return view('pharmastock');
})->name('pharmastock');

Route::get('/dbconn', function () {
    return view('dbconn');
});

Route::get('/product_detailes/{id_product}',[HomeController::class,'product_detailes']);

Route::get('/Product_category', function () {
    return view('home.Product_category');
});

Route::get('/Product_category/{nom}', [HomeController::class, 'Product_category'])->name('Product_category');

Route::get('/grade', function () {
    return view('home.headerhome');
})->name('grade');;



Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);



Route::post('/emails', [ContactController::class, 'sendEmail'])->name('emails');

 

