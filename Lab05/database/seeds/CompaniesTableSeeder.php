<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Peugeot', // ID = 1
            'slug' => 'peugeot',
            'founded_at' => date('Y-m-d', strtotime('1896-04-02')),
            'description' => 'The most popular french car creator',
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('companies')->insert([
            'name' => 'Toyota', // ID = 2
            'slug' => 'toyota',
            'founded_at' => date('Y-m-d', strtotime('1937-08-28')),
            'description' => 'The most reliable japanese car creator',
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('companies')->insert([
            'name' => 'Citroen', // ID = 3
            'slug' => 'citroen',
            'founded_at' => date('Y-m-d', strtotime('1919-05-03')),
            'description' => 'Child company of Peugeot',
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('companies')->insert([
            'name' => 'KIA', // ID = 4
            'slug' => 'kia',
            'founded_at' => date('Y-m-d', strtotime('1937-05-27')),
            'description' => 'The most affordable japanese car creator',
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('companies')->insert([
            'name' => 'BMW', // ID = 5
            'slug' => 'bmw',
            'founded_at' => date('Y-m-d', strtotime('1916-06-02')),
            'description' => 'The most reliable japanese car creator',
            'updated_at' => date('Y-m-d')
        ]);
    }
}
