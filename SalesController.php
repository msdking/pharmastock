<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vent;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function recentSales()
    {
        // Fetch recent sales with type 'vente'

            $topSellingProducts = Product::select('products.*')->selectSub(function ($query) {
                $query->select(DB::raw('COUNT(*)'))
                    ->from('order_product')
                    ->whereRaw('order_product.product_id = products.id_product');
            }, 'order_count')
            ->orderByDesc('order_count')
            ->take(5)
            ->get();


        return view('index', compact( 'topSellingProducts'));
        }
}
