<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrinkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index (Request $request)
    {
             $products = DB::table('products')
              ->join ('companies', 'products.company_id', '=', 'companies.id') 
              ->select('products.*', 'companies.company_name'); 
                 $products->get(); return $products; 
    } 
}
