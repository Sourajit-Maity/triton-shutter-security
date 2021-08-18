<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsTableSeeder extends Seeder
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
                "name" => "Home",
                "slug" => "home_page",
            ],
            [
                "name" => "About",
                "slug" => "about_page",
            ],
            [
                "name" => "Contact",
                "slug" => "contact_page",
            ],
        ];
        foreach($datas as $data){
            Cms::create($data);
        }
    }
}
