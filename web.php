<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\Gestionnaire;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;



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



Route::get('/staticproducts', function () {
    return view('staticproducts');
})->name('staticproducts');;

Route::get('/login', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index');
})->name('index');;

Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::post('/addproducts', [ProductController::class, 'store'])->name('products.store');

Route::get('/addproducts', [ProductController::class, 'create'])->name('addproducts.create');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');

//Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products');


Route::get('/header', function () {
    return view('header');
})->name('header');

Route::get('/pharmastock', function () {
    return view('pharmastock');
})->name('pharmastock');

Route::get('/dbconn', function () {
    return view('dbconn');
});

Route::get('/hash-passwords', function () {

    $users = Gestionnaire::all();
    // Add debugging
    //dd($users);

    if ($users) {
        // Iterate over users (if any)
        foreach ($users as $user) {
            // Hash the password
            $user->password = bcrypt($user->password);
            $user->save();
        }
        return 'Passwords updated successfully!';
    } else {
        return 'No users found with the given condition.';
    }
});


 //
//hada bach ki dir localhost/login tetl3lk page login kima f localhost/login.php hna khes hta dir hed route bch tle3


