<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestionnaire;

class AuthController extends Controller
{

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $user = Gestionnaire::where('email', $credentials['email'])->first();

    if ($user && $user->password === $credentials['password']) {
        // Authentication passe...
        return redirect()->intended('index');
    }

    return back()->withErrors(['email' => 'Invalid email or  password']);
}

}

