<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\Gestionnaire;
use App\Http\Controllers\GestionnaireController; // Assurez-vous d'inclure le contrôleur GestionnaireController

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/header', function () {
    return view('header');
})->name('header');


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


