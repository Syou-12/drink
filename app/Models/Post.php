<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function drinks(){
      return $this->hasMany('App\Models\Drink');
    }

    protected $fillable = 
   [
        'name',
        'kakaku',
        'zaiko',
        'maker',
   ];
 
}

