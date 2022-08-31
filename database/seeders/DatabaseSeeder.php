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
        $this->call(LanguageTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
