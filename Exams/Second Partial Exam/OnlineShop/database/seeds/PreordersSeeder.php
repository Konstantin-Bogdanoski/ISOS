<?php

use Illuminate\Database\Seeder;

class PreordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preorders')->insert([
            'preorder_user' => 'Natasha',
            'quantity' => 16,
            'info' => 'Gib me the milk',
            'product_id' => 1,
        ]);

        DB::table('preorders')->insert([
            'preorder_user' => 'Konstantin',
            'quantity' => 5,
            'info' => 'Gib the milk',
            'product_id' => 1,
        ]);

        DB::table('preorders')->insert([
            'preorder_user' => 'Natasha',
            'quantity' => 2019,
            'info' => 'CHOCOLATES',
            'product_id' => 2,
        ]);

        DB::table('preorders')->insert([
            'preorder_user' => 'Konstantin',
            'quantity' => 9999,
            'info' => 'yes',
            'product_id' => 2,
        ]);

        DB::table('preorders')->insert([
            'preorder_user' => 'Alternator',
            'quantity' => 10,
            'info' => 'The worst f-king translator',
            'product_id' => 2,
        ]);

        DB::table('preorders')->insert([
            'preorder_user' => 'Konstantin',
            'quantity' => 117,
            'info' => 'I have spoken.',
            'product_id' => 3,
        ]);
    }
}
