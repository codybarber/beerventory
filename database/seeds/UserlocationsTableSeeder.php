<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserlocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userlocations')->insert([
            'user_id' => 1,
            'state' => 'GA',
            'city' => 'Atlanta',
        ]);

        DB::table('userlocations')->insert([
            'user_id' => 2,
            'state' => 'CA',
            'city' => 'San Francisco',
        ]);

        DB::table('userlocations')->insert([
            'user_id' => 3,
            'state' => 'AK',
            'city' => 'Kenai',
        ]);
    }
}
