<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import the Order model

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders from the database
        $orders = Order::with(['client','product'])->get();

        // Pass orders data to the view
        return view('listorder', compact('orders'));
    }
}
