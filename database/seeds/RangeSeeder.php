<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('range_price')->insert([
            ['range' => 100],
            ['range' => 500],
            ['range' => 1000],
            ['range' => 2000],
            ['range' => 5000],
            ['range' => 10000],
            ['range' => 20000],
            ['range' => 50000],
            ['range' => 75000],
            ['range' => 100000],
            ['range' => 200000],
            ['range' => 500000],
            ['range' => 1000000],
            ['range' => 5000000],
            ['range' => 10000000],
        ]);
    }
}
