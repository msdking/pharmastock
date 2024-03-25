
<?php
use Illuminate\Support\Facades\Hash;
use App\Models\Gestionnaire;

// Example of storing a new user with a hashed password
$password = 'messaoudi2024';
$hashedPassword = Hash::make($password);

$user = new Gestionnaire();
$user->email = 'msdrabah13@gmail.com';
$user->password = $hashedPassword;
// Set other user attributes...
$user->save();
