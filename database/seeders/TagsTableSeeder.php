<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tags::create(['name' => 'test', 'language_id' => 3]);
        $tag = Tags::create(['name' => 'Приклад', 'language_id' => 2]);
        $tag = Tags::create(['name' => 'Пример', 'language_id' => 1]);

        DB::table('post_tags')->insert([
            'post_id' => 1,
            'tags_id' => 1
        ]);
        DB::table('post_tags')->insert([
            'post_id' => 2,
            'tags_id' => 2
        ]);
        DB::table('post_tags')->insert([
            'post_id' => 3,
            'tags_id' => 3
        ]);


    }
}
