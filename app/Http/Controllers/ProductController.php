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
        $products=$model->getlist($request);
        //$products = Product::all();
        return view('home', ['products'=>$products]);
    } 

    public function create() {
        $companies = DB::table('companies')->get();
        return view('create_view', ['companies'=>$companies]);
    }

    public function store(DrinkRequest $request) {
        
        $model = new Product;
       

        DB::beginTransaction();
        try {
            $model->InsertProduct($request)->save();
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
        $products = Product::find($id);

        return view('edit_view', ['product' =>  $products]);
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
       

        DB::beginTransaction();
        try {
            $model->updateProduct($request)->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
       

        
        return view('home', ['companies'=>$companies]);
           
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