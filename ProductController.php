<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vent;
use App\Models\Category; // Add this line to include the Category model
use App\Models\Gestionnaire; // Add this line to include the Category model


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
       //$product = $products->first(); // Get the first product from the collection
       //dd($product->getAttributes()); // Dump the product's attributes
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

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName(); // Get the original filename
            $photoPath = $photo->storeAs('assets/img', $photoName, 'public');
            $filename = pathinfo($photoPath, PATHINFO_BASENAME); // Extract just the filename
            $validatedData['photo'] = $filename;
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
        $vent = new Vent();
        $vent->id_product = $product->id_product; // Assuming the 'products' table uses 'id' as the primary key
        $vent->quantite = $validatedData['quantite'];
        $vent->id_client = null; // You might want to set this appropriately
        $vent->date = now(); // Current timestamp
        $vent->type = 'achat';
        // Save the vent
        $vent->save();
        // Redirect back or to any other page after successful submission
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('editproduct', compact('product', 'categories'));
    }

    // Method to update product
    // Method to update product
    public function update(Request $request, $id)

{
    //dd('Update method called'); // Add this line

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
    //dd($validatedData); // Add this line to check validated data


    try {
        // Fetch the product to update
        $product = Product::findOrFail($id);

        // Fill the product with new data
        $product->id_category = $validatedData['id_category'];
        $product->nom = $validatedData['nom'];
        $product->description = $validatedData['description'];
        $product->prix_u = $validatedData['prix_u'];
        $product->quantite = $validatedData['quantite'];
        $product->date_expiration = $validatedData['date_expiration'];

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName(); // Get the original filename
            $photoPath = $photo->storeAs('assets/img', $photoName, 'public');
            $filename = pathinfo($photoPath, PATHINFO_BASENAME); // Extract just the filename
            $product->photo = $filename;
        }



        // Save the changes
        $product->save();

        // Redirect back or to any other page after successful update
        return redirect()->back()->with('success', 'Product updated successfully!');
    } catch (\Exception $e) {
        // Log or handle the error appropriately
        return redirect()->back()->with('error', 'Failed to update product. Please try again.');
    }
    dump($validatedData); // Add this line to check validated data

}

    // Method to delete product
    public function destroy($id)
    {

         echo $id;
        $product = Product::findOrFail($id);
        $product->ventss()->delete();

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
