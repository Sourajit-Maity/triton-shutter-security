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
                "industry_name" => " Frames",
                "industry_description" => "frames",
                "active"=> 1,
             
            ],
            [
                "industry_name" => "Test",
                "industry_description" => "test",
                "active"=> 1,
            ],          
        ];
        foreach($datas as $data){
            Industry::create($data);
        }
    }
}
