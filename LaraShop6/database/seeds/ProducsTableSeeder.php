<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProducsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++) { 
            Product::create([
                "title" => $faker->sentence('3'),
                "slug" => $faker->slug,
                "subtitle" => $faker->sentence('6'),
                "description" => $faker->text(),
                "price" => $faker->numberBetween(20,300) * 100,
                "image" => "https://via.placeholder.com/200x250",
                 
            ])->categories()->attach([
                rand(1,5),
                rand(1,5)
            ]);
        }
    }
}
