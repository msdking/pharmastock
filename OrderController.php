<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import the Order model
use App\Models\Product;
use App\Models\Client;
use App\Models\Vent;


class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders from the database
        $orders = Order::with(['client', 'gestionnaire'])->get();
        //dd($orders);
        // Pass orders data to the view
        return view('listorder', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('addorder', compact('products', 'clients'));
    }


    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'id_client' => 'required|integer',
        'id_product' => 'required|array', // Ensure id_product is an array
        'id_product.*' => 'required|integer|exists:products,id_product', // Validate each product ID exists in products table
        'price' => 'required|numeric|min:0',
        'gestionnaire_id' => 'required|integer', // Ensure gestionnaire_id is present

    ]);

    // Create a new order instance
    $order = new Order();
    $order->client_id = $request->id_client;
    $order->price = $request->price;
    $order->status = 'Approved';
    $order->gestionnaire_id = $request->gestionnaire_id; // Assign the gestionnaire_id

     // Assuming status is always 'Approved' for new orders
    $order->save();

    // Attach products to the order
    foreach ($request->id_product as $productId) {
        $product = Product::findOrFail($productId);
    }
    foreach ($request->id_product as $productId) {
        $quantity = $request->input($productId . '-num-pallets');

        $vent = new Vent();
        $vent->id_product = $productId;
        $vent->quantite = $quantity; // Assuming each product has quantity 1
        $vent->id_client = $request->id_client;
        $vent->date = now();
        $vent->type = 'vente';
        $vent->save();
    }

    // Redirect back with success message
    return redirect()->back()->with('success', 'Order added successfully!');
}


}



