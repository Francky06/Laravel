<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);
        Category::create([
            'name' => 'Design',
            'slug' => 'design'
        ]);
        Category::create([
            'name' => 'Culture',
            'slug' => 'culture'
        ]);
        Category::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);
        Category::create([
            'name' => 'Politics',
            'slug' => 'politics'
        ]);

    }
}
