<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::create([]);
        $post->translations()->create([
            'language_id' => 1,
            'title' => 'Тестовый заголовок',
            'description' => 'Краткое описание',
            'content' => 'Полное описание'
        ]);
        $post = Post::create([]);
        $post->translations()->create([
            'language_id' => 2,
            'title' => 'Тестовий заголовок',
            'description' => 'Короткий опис',
            'content' => 'Повний опис'
        ]);
        $post = Post::create([]);
        $post->translations()->create([
            'language_id' => 3,
            'title' => 'Test title',
            'description' => 'Test description',
            'content' => 'Test content'
        ]);

    }
}
