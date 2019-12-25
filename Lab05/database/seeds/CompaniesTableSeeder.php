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
            'name' => 'Peugeot',
            'slug' => 'peugeot',
            'founded_at' => date('Y-m-d', strtotime('1896-04-02')),
            'description' => 'The most popular french car creator',
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('companies')->insert([
            'name' => 'Toyota',
            'slug' => 'toyota',
            'founded_at' => date('Y-m-d', strtotime('1937-08-28')),
            'description' => 'The most reliable japanese car creator',
            'updated_at' => date('Y-m-d')
        ]);
    }
}
