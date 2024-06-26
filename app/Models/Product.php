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

        $keyword = $request->input('keyword');
        $company = $request->input('company_name');


        $query = DB::table('products')
               ->join('companies', 'products.company_id', '=', 'companies.id')
               ->select('products.*', 'companies.company_name');
               
               if($keyword) {
                 $query->where('product_name', 'LIKE', "%{$keyword}%");
               }

               if($company) {
                 $query->where('company_id', '=', "$company");
               }
              
                $products = $query->get();
    return $products;
    }

    //$keyword = $request->input('keyword');
   // if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
       // $products->where('company_name', 'LIKE', "%{$keyword}%")
       // ->orwhereHas('products', function ($query) use ($keyword) {
           // $products->where('product_name', 'LIKE', "%{$keyword}%");
       // });
  //  }

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
 
     public function InsertProduct($request, $img_path)
     {
         
         return Product::create([
           'company_id' => $request->input('company_name'),
           'img_path' => $img_path,
           'product_name' => $request->input('product_name'),
           'price' => $request->input('price'),
           'stock' => $request->input('stock'),
           'comment' => $request->input('comment'),
         ]);
           
     }


     /** 詳細表示 **/

     public function getdetail($id){
        $product = DB::table('products')
               ->join('companies', 'products.company_id', '=', 'companies.id')
               ->select('products.*', 'companies.company_name')
               ->where('products.id', '=', $id)
               ->first();
               
               return $product;  
     }


      /**
     * 更新処理
     */
    public function updateProduct($request, $product)
    {
        try {
            // 更新する各フィールドの値を設定する
            $product->company_id = $request->input('company_name');
            $product->product_name = $request->input('product_name');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->comment = $request->input('comment');
    
            // 画像がアップロードされている場合は処理を行う
            if ($request->hasFile('img_path')) {
                $image = $request->file('img_path');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $file_name);
                $img_path = 'storage/images/' . $file_name;
                $product->img_path = $img_path;
            }
    
            // モデルの変更をデータベースに保存する
            $result = $product->save();
    
            return $result;
        } catch (\Exception $e) {
            // エラーハンドリング
            return false;
        }
    }

}





 //if(request('img_path')) {
             //$name=request()->file('img_path')->getClientOriginalName();
             //$file=request()->file('img_path')->move('storage/images',$name);
            // $products->img=$name;
            // }





