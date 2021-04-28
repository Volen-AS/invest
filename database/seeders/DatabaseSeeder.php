<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\TokenTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ChatAffiliateSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TokenTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ChatAffiliateSeeder::class);
    }
}
