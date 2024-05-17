<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $product = Product::paginate(10);
        return view('home.userpage', compact('product'));
    }
    public function grade()
    {
       $client = DB::table('Clients')->where('id_client',1)->first();
        return view('home.headerhome', compact('client'));
    }
    public function product_detailes($id_product)  {
        $product=Product::find($id_product);
        $category = $product->id_category;
        return view('home.product_detailes',['product' => $product, 'category' => $category]);
        
    }


    public function Product_category($nom)
    {
    // Recherche de la catégorie par son nom
    $category = DB::table('Category')->where('nom', $nom)->first();
    // Vérification si la catégorie existe
    if (!$category) {
        // Gérer le cas où la catégorie n'est pas trouvée, par exemple renvoyer une erreur 404
        abort(404);
       
    }
   
    // Récupération des produits de la catégorie
   $categories = DB::table('Category')->get();
    
   $product = DB::table('Products')->where('id_category',$category->id_category)->first();

   
    // Passer les données à la vue
    return view('Product_category', ['category' => $category, 'products' => $product ,'categories' => $categories]);
}


   

    public function about()  {
    
      return view('home.about');
    
    }
    public function contact()  {
    
      return view('home.contact');
      
    }

}
