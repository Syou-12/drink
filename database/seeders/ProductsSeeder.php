<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('Products')->insert([
            [
                'id'=>'1',
                'company_id'=>'1',
                'img_path'=>'画像',
                'product_name'=> 'コーラ',
                'price'=> '100',
                'stock'=> '1',
                'maker_name'=> 'コカ・コーラ',
                'comment'=>'test',
                'created_at'=>'20191004152507',
                'updated_at'=>'20191004152507',
            ],
          
        ]);
    }
}
