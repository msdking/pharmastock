<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Add this line to include the Category model

class ProductController extends Controller
{
    // Method to display add product form
    public function create()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass categories data to the view
        return view('addproducts', compact('categories'));
    }
    public function index()
    {

        $products = Product::all();
        return view('products', compact('products'));
    }


    // Method to store new product
    public function store(Request $request)
    {
        //dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'id_category' => 'required|integer',
            'nom' => 'required|string|max:100',
            'description' => 'nullable|string',
            'prix_u' => 'required|numeric',
            'quantite' => 'nullable|integer',
            'date_expiration' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        // Create a new product instance
        $product = new Product();
        $product->id_category = $validatedData['id_category'];
        $product->nom = $validatedData['nom'];
        $product->description = $validatedData['description'];
        $product->prix_u = $validatedData['prix_u'];
        $product->quantite = $validatedData['quantite'];
        $product->date_expiration = $validatedData['date_expiration'];
        $product->photo = $validatedData['photo'] ?? null;
        //dd($product);
        $product->save();

        // Redirect back or to any other page after successful submission
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
