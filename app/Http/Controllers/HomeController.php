<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrinkRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\drink;



class HomeController extends Controller
{
    
    
    /**
    * @param int $id
    * @return view
    */

    public function showDetail($id)
    {
        $drink = Drink::find($id);

        return view('drink.detail', ['drink' =>  $drink]);
    }

    
    public function Update(DrinkRequest $request)
    {
        $inputs = $request->all();

        \DB::beginTransaction();

     
            $drink = Drink::find($inputs['id']);
            $drink->fill([
                'name'=> $inputs['name'],
                'maker'=>$inputs['maker'],
                'kakaku'=>$inputs['kakaku'],
                'zaiko'=>$inputs['zaiko'],
                'coment'=>$inputs['coment'],
            ]);
            $drink->save();
            \DB::commit();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
    }
}
