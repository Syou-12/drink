<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drink extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function getList() {
        // articlesテーブルからデータを取得
        $drinks = DB::table('drinks')->get();
   
        return $drinks;
    }
     
     protected $fillable = [
        'id',
        'img',
        'name',
        'kakaku',
        'zaiko',
        'maker',
        'cment',
     ];

     /**
     * 更新処理
     */
    public function updatedrink($request, $drink)
    {
        $result = $drink->fill([
            'name' => $request->name
        ])->save();

        return $result;
    }

     public $timestamps = false;
}
