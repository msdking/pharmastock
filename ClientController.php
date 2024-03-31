<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Fetch all clients from the database
        return view('listclients', compact('clients')); // Pass clients data to the view
    }

public function store(Request $request)
{

    // Validate the incoming request data
    $validatedData = $request->validate([
        'nom' => 'required|string|max:50',
        'prenom' => 'required|string|max:50',
        'email' => 'required|string|email|max:50',
        'password' => 'required|string|max:50',
        'address' => 'nullable|string|max:50',
        'tel' => 'nullable|string|max:20',
        'grade' => 'nullable|string|max:50',
    ]);

    // Create a new client instance
    $client = new Client();
    $client->nom = $validatedData['nom'];
    $client->prenom = $validatedData['prenom'];
    $client->email = $validatedData['email'];
    $client->password = $validatedData['password']; // Hash the password for security
    $client->address = $validatedData['address'];
    $client->tel = $validatedData['tel'];
    $client->grade = $validatedData['grade'];
    //dd($client);
    $client->save();

    // Redirect back or to any other page after successful submission
    return redirect()->back()->with('success', 'Client added successfully!');
}

}
