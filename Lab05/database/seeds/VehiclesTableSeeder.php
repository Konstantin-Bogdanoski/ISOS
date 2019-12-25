<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'mark' => '307',
            'slug' => 'peugeot-307',
            'price' => 16990.50,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2006-05-05')),
            'description' => '2007 Sedan',
            'company_id' => 1,// 1 - Peugeot
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => '3008',
            'slug' => 'peugeot-3008',
            'price' => 26990.90,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2017-10-06')),
            'description' => '2017 Crossover SUV',
            'company_id' => 1,// 1 - Peugeot
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => '508',
            'slug' => 'peugeot-508',
            'price' => 48990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2016-11-02')),
            'description' => '2016 Luxury Sedan',
            'company_id' => 1,// 1 - Peugeot
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'RAV 4',
            'slug' => 'toyota-rav4',
            'price' => 29990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2017-10-10')),
            'description' => '2007 Sedan',
            'company_id' => 2,// 2 - Toyota
            'updated_at' => date('Y-m-d')
        ]);
    }
}
