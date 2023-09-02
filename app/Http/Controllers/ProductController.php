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
        return view('create_view');
    }

    public function store(Request $request) {
        
        $model = new Product;
        $products = Product::find($request->id);

        DB::beginTransaction();
        try {
            $model->fill($request->all())->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        //$products = new Product;
       // $products->company_id = $request->input(["company_id"]);
       // $products->product_name = $request->input(["product_name"]);
       // $products->price = $request->input(["price"]);
       // $products->stock = $request->input(["stock"]);
       // $products->company_name = $request->input(["company_name"]);
       // $products->comment = $request->input(["comment"]);
       // $products->timestamps = false;

       // if(request('img')) {
           // $name=request()->file('img')->getClientOriginalName();
           // $file=request()->file('img')->move('storage/images',$name);
          //  $products->img=$name;
    //    }

        //$products->save();

        return redirect()->route('create');
    }

    /**
    * @param int $id
    * @return view
    */

    public function showDetail($id)
    {
        $products = Product::find($id);

        return view('detail_view', ['product' =>  $products]);
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

    public function Update(Request $request, $id)
    {
        
        $products = Product::find($id);

        $products->company_id = $request->input(["company_id"]);
        $products->product_name = $request->input(["product_name"]);
        $products->price = $request->input(["price"]);
        $products->stock = $request->input(["stock"]);
        $products->company_name = $request->input(["company_name"]);
        $products->comment = $request->input(["comment"]);
        $products->timestamps = false;

        if(request('img')) {
            $name=request()->file('img')->getClientOriginalName();
            $file=request()->file('img')->move('storage/images',$name);
            $products->img=$name;
        }

        $products->save();

        
            return redirect()->route('home');
           
    }
}


