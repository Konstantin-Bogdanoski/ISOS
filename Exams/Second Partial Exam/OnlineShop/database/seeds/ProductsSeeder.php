<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Milk',
            'slug' => 'milk',
            'image' => 'https://i0.wp.com/post.healthline.com/wp-content/uploads/2019/11/milk-soy-hemp-almond-non-dairy-1296x728-header-1296x728.jpg?w=1155&h=1528',
            'description' => 'Fresh milk',
            'price' => 5.99,
            'required_number' => 2, //This is the number of preorders NOT the quantity in those preorders
        ]);

        DB::table('products')->insert([
            'name' => 'Chocolate',
            'slug' => 'chocolate',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Chocolate_%28blue_background%29.jpg',
            'description' => 'Tasty chocolate',
            'price' => 2.99,
            'required_number' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Nescafe',
            'slug' => 'nescafe',
            'image' => 'https://www.austriansupermarket.com/media/catalog/product/cache/2/image/800x800/9df78eab33525d08d6e5fb8d27136e95/n/e/nes1036_2.jpg',
            'description' => 'Coffee',
            'price' => 0.99,
            'required_number' => 1,
        ]);
    }
}
