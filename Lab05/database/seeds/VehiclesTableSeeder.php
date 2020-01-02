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
            'mark' => 'Celica',
            'slug' => 'toyota-celica',
            'price' => 19990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('1994-10-10')),
            'description' => '1994 Sports car',
            'company_id' => 2,// 2 - Toyota
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'Corolla',
            'slug' => 'toyota-corolla',
            'price' => 24990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2010-07-08')),
            'description' => '2010 Family sedan',
            'company_id' => 2,// 2 - Toyota
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'Land Cruiser',
            'slug' => 'toyota-landcruiser',
            'price' => 79990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2018-12-12')),
            'description' => '2018 Luxury SUV',
            'company_id' => 2,// 2 - Toyota
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'CH-R',
            'slug' => 'toyota-chr',
            'price' => 27990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2015-07-07')),
            'description' => '2015 Hybrid Hatchback',
            'company_id' => 2,// 2 - Toyota
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'MK 3',
            'slug' => 'bmw-mk3',
            'price' => 37990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2013-05-13')),
            'description' => '2013 Sport sedan',
            'company_id' => 5,// 5 - BMW
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'X7',
            'slug' => 'bmw-x7',
            'price' => 109990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2018-10-13')),
            'description' => '2018 Sport sedan',
            'company_id' => 5,// 5 - BMW
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('vehicles')->insert([
            'mark' => 'Telluride',
            'slug' => 'kia-telluride',
            'price' => 79990.00,
            'created_at' => date('Y-m-d'),
            'released_at' => date('Y-m-d', strtotime('2018-09-25')),
            'description' => '2018 Luxury SUV',
            'company_id' => 4,// 5 - BMW
            'updated_at' => date('Y-m-d')
        ]);
    }
}
