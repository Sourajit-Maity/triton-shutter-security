<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms;
use App\Models\HomePage;
class HomePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = Cms::whereSlug('home_page')->first();
        $datas = [
            "cms_id" => $cms->id,
            "banner_heading" => "Home page heading",
            "banner_sub_heading" => "Home page sub heading",
            "banner_description" => "desciption",
        ];
        HomePage::create($datas);
    }
}
