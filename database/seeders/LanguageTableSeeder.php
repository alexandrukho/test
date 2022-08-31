<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'locale' => 'Russian',
            'prefix' => 'RU'
        ]);
        Language::create([
            'locale' => 'Ukrainian',
            'prefix' => 'UA'
        ]);
        Language::create([
            'locale' => 'English',
            'prefix' => 'EN'
        ]);
    }
}
