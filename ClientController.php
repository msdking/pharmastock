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
public function edit($id)
    {
        $client = Client::findOrFail($id); // Find the client by ID
        return view('editclients', compact('client')); // Pass the client data to the edit view
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'address' => 'nullable|string|max:50',
            'tel' => 'nullable|string|max:20',
            'grade' => 'nullable|string|max:50',
        ]);

        // Find the client by ID
        $client = Client::findOrFail($id);

        // Update client attributes with validated data
        $client->nom = $validatedData['nom'];
        $client->prenom = $validatedData['prenom'];
        $client->email = $validatedData['email'];
        $client->address = $validatedData['address'];
        $client->tel = $validatedData['tel'];
        $client->grade = $validatedData['grade'];

        // Save the updated client
        $client->save();

        // Redirect back or to any other page after successful update
        return redirect()->back()->with('success', 'Client updated successfully!');
    }

    public function destroy($id)
    {
        // Find the client by ID and delete it
        $client = Client::findOrFail($id);
        $client->delete();

        // Redirect back or to any other page after successful deletion
        return redirect()->back()->with('success', 'Client deleted successfully!');
    }
}


