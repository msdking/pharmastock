<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line
use App\Models\Gestionnaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user by their email address
        $gestionnaire = Gestionnaire::where('email', $request->email)->first();

        // Check if a user with the provided email exists
        if ($gestionnaire) {
            // Verify the password using plaintext comparison
            if ($request->password === $gestionnaire->password) {
                // Password matches; user is authenticated

                // Pass the $gestionnaire data to all views
                view()->share('gestionnaire', $gestionnaire);
                $request->session()->put('gestionnaire', $gestionnaire);

                // Redirect the user to the desired location
                return view('index', ['gestionnaire' => $gestionnaire]);
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password']);
    }

        
 }





