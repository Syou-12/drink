<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;

    public function getlist(){
        $products = DB::table('products')
               ->join('companies', 'products.company_id', '=', 'companies.id')
                 ->select('products.*', 'companies.company_name');

               $products->get();

    return $products;
    }
     
     


}
