<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Add this line
use App\Models\Admin;
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
        $admin = Admin::where('email', $request->email)->first();

        // Check if a user with the provided email exists
        if ($admin) {
            // Verify the password using plaintext comparison
            if ($request->password === $admin->password) {
                // Password matches; user is authenticated

                // Pass the $gestionnaire data to all views
                view()->share('admin', $admin);
                $request->session()->put('admin', $admin);

                // Redirect the user to the desired location
                return view('index', ['admin' => $admin]);
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password']);
    }


 }
