<?php

use Illuminate\Database\Seeder;

use App\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->name(),
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'from' => $faker->date("H:i:s"),
                'to' => $faker->date("H:i:s"),
                'limit'=>$faker->numberBetween($min = 10, $max = 40),
                
                'image1' => $faker->image('public/img',300, 300),
                
                'description'=> $faker->paragraph($nb =8),
            ]);
        }
    }
}