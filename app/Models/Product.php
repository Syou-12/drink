<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getlist($request){
        $query = DB::table('products')
               ->join('companies', 'products.company_id', '=', 'companies.id')
               ->select('products.*', 'companies.company_name');
               $keyword = $request->input('keyword');
               if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
                   $products->where('company_name', 'LIKE', "%{$keyword}%")
                   ->orwhereHas('products', function ($query) use ($keyword) {
                       $products->where('product_name', 'LIKE', "%{$keyword}%");
                   });
                }
                $products = $query->get();
    return $products;
    }

   

    protected $fillable = [
        'company_id',
        'img_path',
        'product_name',
        'price',
        'stock',
        'company_name',
        'comment',
     ];
     

     public function findAllProducts()
     {
         return Product::all();
     }
 
     public function InsertProduct($request)
     {
         
         return $this->create([
           'company_id' => $request->company_id,
           'product_name' => $request->product_name,
           'price' => $request->price,
           'stock' => $request->stock,
           'company_name' => $request->company_name,
           'comment' => $request->comment,
         ]);
           if(request('img')) {
            $name=request()->file('img')->getClientOriginalName();
            $file=request()->file('img')->move('storage/images',$name);
            $products->img=$name;
            }
     }

      /**
     * 更新処理
     */
     public function updatedrink($request, $products)
     {
         $result = $products->fill([
             'product_name' => $request->name
         ])->save();
 
         return $result;
     }
 
      public $timestamps = false;


}
