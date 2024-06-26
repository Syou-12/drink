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
        
        $model = new Product;
        $companies = DB::table('companies')->get();
        $products=$model->getlist($request);
        //$products = Product::all();
        return view('home', ['products'=>$products , 'companies' => $companies]);
    } 

    public function create() {
        $companies = DB::table('companies')->get();
        return view('create_view', ['companies'=>$companies]);
    }

    public function store(DrinkRequest $request) {
        
        $model = new Product;
       
        $image = $request->file('img_path');
        $file_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $file_name);
        $img_path = 'storage/images/' . $file_name;
      


        DB::beginTransaction();
        try {
            $model->InsertProduct($request , $img_path)->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

       

        return redirect()->route('create');
    }

    /**
    * @param int $id
    * @return view
    */

    public function showDetail(Request $request, $id)
    {
        $products = Product::find($id);
        $product= $products->getdetail($id);
        return view('detail_view', ['product' =>  $product]);
    }

     /**
    * @param int $id
    * @return view
    */

    public function showEdit($id)
    {
        $model = new Product();
        $product = $model->getdetail($id);
        $companies = DB::table('companies')->get();

        return view('edit_view', ['product' =>  $product, 'companies' => $companies]);
    }

    public function destroy($id)
    {
        $products = Product::find($id);

        $products->delete();

        return redirect()->route('home');
    }

    public function Update(DrinkRequest $request, $id)
    {
        $companies = DB::table('companies')->get();
        $products = Product::find($id);
    
        if (!$products) {
            // 商品が存在しない場合のエラーハンドリング
            return redirect()->back()->with('error', '指定された商品が見つかりませんでした。');
        }
    
        DB::beginTransaction();
        try {
            $model->updateProduct($request, $products)->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // エラーが発生した場合のエラーハンドリング
            return redirect()->back()->with('error', '商品の更新中にエラーが発生しました。');
        }
    
        return view('home', ['products' => $products, 'companies' => $companies]);
}
}




// updateの中身 //

//$products = Product::find($id);

//$products->company_id = $request->input(["company_id"]);
//$products->product_name = $request->input(["product_name"]);
//$products->price = $request->input(["price"]);
//$products->stock = $request->input(["stock"]);
//$products->company_name = $request->input(["company_name"]);
//$products->comment = $request->input(["comment"]);
//$products->timestamps = false;

//if(request('img')) {
    //$name=request()->file('img')->getClientOriginalName();
   // $file=request()->file('img')->move('storage/images',$name);
   // $products->img=$name;
//}

//$products->save();