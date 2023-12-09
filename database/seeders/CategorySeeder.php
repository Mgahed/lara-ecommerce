<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($cat = 0; $cat < 10; $cat++) {
            Category::create([
                'name_en' => 'category' . ((string)($cat + 1)),
                'name_ar' => 'تصنيف' . ((string)($cat + 1)),
                'slug' => 'category' . ((string)($cat + 1)),
                'img' => 'https://placekitten.com/300/300'
            ]);
        }
    }
}
