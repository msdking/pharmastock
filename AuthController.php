<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Gestionnaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
class AuthController extends Controller
{


    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the admin
        $adminCredentials = $request->only('email', 'password');
        if (Auth::attempt($adminCredentials)) {
            // Authentication successful, redirect to the appropriate page
            return redirect()->route('index')->with('success', 'Connexion réussie !');
        }

        // Attempt to authenticate the gestionnaire
        $gestionnaireCredentials = $request->only('email', 'password');
        if (Auth::guard('gestionnaires')->attempt($gestionnaireCredentials)) {
            // Authentication successful, redirect to the appropriate page
            return redirect()->route('index')->with('success', 'Connexion réussie !');
        }

        // Authentication failed for both admin and gestionnaire
        return back()->withErrors(['email' => 'Invalid email or password']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function create(){
        return view('inscription');
    }
/*************inscription***********/
public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
        'tel' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'photo' => 'required|image|max:2048',
        'civilite' => 'required|string|max:255',
    ]);

    // Hachage du mot de passe
    $password = Hash::make($request->password);

    // Création de l'utilisateur avec le mot de passe haché
    $user = Admin::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => $password, // Utilisation du mot de passe haché
        'tel' => $request->tel,
        'address' => $request->address,
        'photo' => $request->photo,
        'civilite' => $request->civilite,
    ]);

    // Authentification de l'utilisateur après sa création
    Auth::login($user);

    // Redirection vers la page d'accueil
    return redirect()->route('index');
}

/*************Cree des utilisateur***********/
    public function cree(Request $request)
    {
        $nom = $request->nom;
        $prenom = $request->prenom;
        $email = $request->email;
        $password = $request->password;
        $tel = $request->tel;
        $address = $request->address;
        $photo = $request->photo;
        $civilite = $request->civilite;

        //Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'tel' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'civilite' => 'required|string|max:255',
        ]);
        //Insertion
        $password = Hash::make($request->password);
        if ($request->type === 'admin') {
            $user = Admin::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $password,
                'tel' => $tel,
                'address' => $address,
                'photo' => $photo,
                'civilite' => $civilite,
            ]);
        } elseif ($request->type === 'gestionnaire') {
            $user = Gestionnaire::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $password,
                'tel' => $tel,
                'address' => $address,
                'photo' => $photo,
                'civilite' => $civilite,
            ]);
        }
        return redirect()->route('tables-general');
    }
    public function index()
    {
        $admins = Admin::all();
        $gestionnaires = Gestionnaire::all();

        // Ajoutez un champ 'type' à chaque élément pour différencier les admins des gestionnaires
        $admins->each(function ($admin) {
            $admin->type = 'admin';
        });
        $gestionnaires->each(function ($gestionnaire) {
            $gestionnaire->type = 'gestionnaire';
        });

        // Fusionnez les deux collections
        $users = $admins->merge($gestionnaires);

        return view('tables-general', compact('users'));
    }
    // Method to delete user
    public function destroy($type,$id)
    {
    echo $type;
    echo $id;
    if($type === 'gestionnaire'){
        $gestionnaire = Gestionnaire::findOrFail($id);
        $gestionnaire->delete();
        return redirect()->back()->with('success', 'gestionnaire deleted successfully!');
    }
    elseif($type === 'admin'){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('success', 'admin deleted successfully!');
    }
    }
    public function edit($type)
    {
        if($type === 'gestionnaire'){
        $gestionnaire = Gestionnaire::findOrFail($type);
        compact('gestionnaire');
    }
    elseif($type === 'admin'){
        $admin = Admin::findOrFail($type);
        compact('admin');
    }
    }
        // Method to update product
        public function update(Request $request, $id)

        {
            //dd('Update method called'); // Add this line

            // Validate the incoming request data
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
                'tel' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'photo' => 'required|image|max:2048',
                'civilite' => 'required|string|max:255',
            ]);
            //dd($validatedData); // Add this line to check validated data


            try {
                // Fetch the product to update
                if($type === 'gestionnaire'){
                    $gestionnaire = Gestionnaire::findOrFail($type);
                    compact('gestionnaire');


                // Fill the product with new data
                $gestionnaire->nom = $validatedData['nom'];
                $gestionnaire->prenom = $validatedData['prenom'];
                $gestionnaire->email = $validatedData['email'];
                $gestionnaire->password = $validatedData['password'];
                $gestionnaire->tel = $validatedData['tel'];
                $gestionnaire->address = $validatedData['address'];
                $gestionnaire->civilite = $validatedData['civilite'];

                // Handle photo upload if provided
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    $photoName = $photo->getClientOriginalName(); // Get the original filename
                    $photoPath = $photo->storeAs('assets/img', $photoName, 'public');
                    $filename = pathinfo($photoPath, PATHINFO_BASENAME); // Extract just the filename
                    $product->photo = $filename;
                }
                $gestionnaire->save();
            }
            if($type === 'admin'){
                $admin = Admin::findOrFail($type);
                compact('admin');


            // Fill the product with new data
            $admin->nom = $validatedData['nom'];
            $admin->prenom = $validatedData['prenom'];
            $admin->email = $validatedData['email'];
            $admin->password = $validatedData['password'];
            $admin->tel = $validatedData['tel'];
            $admin->address = $validatedData['address'];
            $admin->civilite = $validatedData['civilite'];

            // Handle photo upload if provided
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = $photo->getClientOriginalName(); // Get the original filename
                $photoPath = $photo->storeAs('assets/img', $photoName, 'public');
                $filename = pathinfo($photoPath, PATHINFO_BASENAME); // Extract just the filename
                $admin->photo = $filename;
            }
            $admin->save();
        }

                // Save the changes


                // Redirect back or to any other page after successful update
                return redirect()->back()->with('success', 'User updated successfully!');
            } catch (\Exception $e) {
                // Log or handle the error appropriately
                return redirect()->back()->with('error', 'Failed to update User. Please try again.');
            }
            dump($validatedData); // Add this line to check validated data

        }
 }



