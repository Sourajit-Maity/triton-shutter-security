<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;
class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                "industry_name" => "IT",
                "industry_description" => "it",
                "active"=> 1,
             
            ],
            [
                "industry_name" => "Fashion",
                "industry_description" => "fashion",
                "active"=> 1,
            ],  
            [
                "industry_name" => "Music & Arts",
                "industry_description" => "music $ arts",
                "active"=> 1,
             
            ],
            [
                "industry_name" => "Film",
                "industry_description" => "film",
                "active"=> 1,
            ],  
            [
                "industry_name" => "LifeStyle",
                "industry_description" => "lifestyle",
                "active"=> 1,
             
            ],
            [
                "industry_name" => "Travel",
                "industry_description" => "travel",
                "active"=> 1,
            ],  
            [
                "industry_name" => "Sport",
                "industry_description" => "sport",
                "active"=> 1,
             
            ],
            [
                "industry_name" => "Sales",
                "industry_description" => "sales",
                "active"=> 1,
            ],          
        ];
        foreach($datas as $data){
            Industry::create($data);
        }
    }
}
