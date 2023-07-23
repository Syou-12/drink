<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \DB::table('drinks')->insert([
            [
                'id'=>'1',
                'img'=>'画像',
                'name'=> 'コーラ',
                'kakaku'=> '100',
                'zaiko'=> '1',
                'maker'=> 'コカ・コーラ',
            ],
            [
                'id'=>'2',
                'img'=>'画像',
                'name'=> 'サイダー',
                'kakaku'=> '100',
                'zaiko'=> '1',
                'maker'=> '三ツ矢',
            ],
            [
                'id'=>'3',
                'img'=>'画像',
                'name'=> 'お茶',
                'kakaku'=> '100',
                'zaiko'=> '1',
                'maker'=> 'サントリー',
            ],
        ]);
    }
}
