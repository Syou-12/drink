<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrinkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Post;


class DrinkController extends Controller
{
    public function showList()
    {
        $model = new Drink();
        $drinks = $model->getList();

       return view('home', ['drinks' => $drinks]);
    }


    public function create() {
        return view('create');
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
        $drink->save();

        return redirect()->route('create');
    }

     
    /**
    * @param int $id
    * @return view
    */

    public function showDetail($id)
    {
        $drink = Drink::find($id);

        return view('drink.detail', ['drink' =>  $drink]);
    }

     /**
    * @param int $id
    * @return view
    */

    public function showEdit($id)
    {
        $drink = Drink::find($id);

        return view('drink.edit', ['drink' =>  $drink]);
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
