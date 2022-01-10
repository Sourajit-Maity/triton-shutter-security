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
                "profession_name" => " Frames",
                "active"=> 1,
             
            ],
            [
                "profession_name" => "Test",
                "active"=> 1,
            ],          
        ];
        foreach($datas as $data){
            Profession::create($data);
        }
    }
}
