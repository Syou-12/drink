<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrinkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Product;


class DrinkController extends Controller
{
    public function index(Request $request)
    {
       $model = new Product;
       $products = $model->getlist();

       return view('home', compact('products'));
    }


    public function create() {
        return view('create_view');
    }

    public function store(DrinkRequest $request) {

        $drink = new Drink;
        $drink->id = $request->input(["id"]);
        $drink->img = $request->input(["img"]);
        $drink->name = $request->input(["name"]);
        $drink->kakaku = $request->input(["kakaku"]);
        $drink->zaiko = $request->input(["zaiko"]);
        $drink->maker = $request->input(["maker"]);
        $drink->coment = $request->input(["coment"]);
        $drink->timestamps = false;

        if(request('img')) {
            $name=request()->file('img')->getClientOriginalName();
            $file=request()->file('img')->move('storage/images',$name);
            $drink->img=$name;
        }

        $drink->save();

        return redirect()->route('create_view');
    }

     
    /**
    * @param int $id
    * @return view
    */

    public function showDetail($id)
    {
        $drink = Drink::find($id);

        return view('detail_view', ['drink' =>  $drink]);
    }

     /**
    * @param int $id
    * @return view
    */

    public function showEdit($id)
    {
        $drink = Drink::find($id);

        return view('edit_view', ['drink' =>  $drink]);
    }


    public function Update(DrinkRequest $request, $id)
    {
        
        $drink = Drink::find($id);

        $drink->img = $request->input(["img"]);
        $drink->name = $request->input(["name"]);
        $drink->kakaku = $request->input(["kakaku"]);
        $drink->zaiko = $request->input(["zaiko"]);
        $drink->maker = $request->input(["maker"]);
        $drink->coment = $request->input(["coment"]);
        $drink->timestamps = false;

        if(request('img')) {
            $name=request()->file('img')->getClientOriginalName();
            $file=request()->file('img')->move('storage/images',$name);
            $drink->img=$name;
        }

        $drink->save();
        
            return redirect()->route('home');
           
    }

    public function destroy($id)
    {
        $drink = Drink::find($id);

        $drink->delete();

        return redirect()->route('home');
    }

}
