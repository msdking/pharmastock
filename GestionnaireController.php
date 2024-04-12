<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestionnaire;
use Illuminate\Support\Facades\Session;

class GestionnaireController extends Controller
{
    public function showProfile()
    {
        // Retrieve the logged-in gestionnaire from the session
        $gestionnaire = Session::get('gestionnaire');

        // Check if gestionnaire exists
        if (!$gestionnaire) {
            abort(404); // Or handle the error accordingly
        }

        return view('profile', ['gestionnaire' => $gestionnaire]);
    }

    public function updateProfile(Request $request)
{
    $gestionnaire = Session::get('gestionnaire');
    $id=$gestionnaire->id;
    // Validate form data
    $request->validate([
        'nom' => 'required|string|max:50',
        'prenom' => 'required|string|max:50',
        'email' => 'required|string|email|max:50|unique:gestionnaires,email,' . $gestionnaire->id,
        'password' => 'nullable|string|min:6',
        'tel' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'civilite' => 'nullable|string|max:255',
    ]);

    // Find the gestionnaire by ID
    $gestionnaire = Gestionnaire::findOrFail($id);

    // Update gestionnaire data
    $gestionnaire->fill($request->except('photo'));

    // Handle photo upload if provided
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $gestionnaire->photo = $photoPath;
    }

    // Save the updated gestionnaire data
    $gestionnaire->save();

    // Store updated gestionnaire data in the session
    Session::put('gestionnaire', $gestionnaire);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Profile updated successfully!');
}
}



