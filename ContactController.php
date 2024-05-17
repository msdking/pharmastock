<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        // Envoyer l'e-mail à l'administrateur
        Mail::to('admin@example.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}
