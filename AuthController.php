<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestionnaire;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('gestionnaire')->attempt($credentials)) {
            $user = Auth::guard('gestionnaire')->user();
            return redirect()->route('header')->with('user', $user);
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }
}


// AuthController.php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Gestionnaire;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $user = Gestionnaire::where('email', $request->email)->first();

        // Hash the provided password
        $passwordHashed = Hash::make($request->input('password'));

        // Check if the user exists and the passwords match
        $passwordValid = $user && password_verify($passwordHashed, $user->password);

        if ($passwordValid) {
            Auth::login($user);
            return redirect()->route('header');
        } else {
            return back()->withErrors(['error' => 'Identifiants invalides'])->withInput();
        }
    }
}*/
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestionnaire;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // Validate the user's email and password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::guard('gestionnaire')->attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/dashboard');
        }

        // Authentication was not successful
        return back()->withErrors(['email' => 'Invalid email or password']);
    }
}*/

