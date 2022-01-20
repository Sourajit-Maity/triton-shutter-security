<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;
class ProfessionSeeder extends Seeder
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
                "profession_name" => "Business Owner",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "App developer",
                "active"=> 1,
            ], 
            [
                "profession_name" => "Yoga Teacher",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "Photographer",
                "active"=> 1,
            ], 
            [
                "profession_name" => "UI/UX",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "Model",
                "active"=> 1,
            ],   
            [
                "profession_name" => "Healer",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "Agent",
                "active"=> 1,
            ], 
            [
                "profession_name" => "Artist",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "Investor",
                "active"=> 1,
            ],        
        ];
        foreach($datas as $data){
            Profession::create($data);
        }
    }
}
