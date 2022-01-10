<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CmsTableSeeder::class);
        $this->call(HomePageTableSeeder::class);
        $this->call(IndustrySeeder::class);
        $this->call(ProfessionSeeder::class);
        
        // \App\Models\User::factory(10)->create();
    }
}
