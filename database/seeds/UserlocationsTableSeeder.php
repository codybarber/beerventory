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
            'state_id' => 12,
            'city' => 'Tampa',
        ]);

        DB::table('userlocations')->insert([
            'user_id' => 2,
            'state_id' => 6,
            'city' => 'San Francisco',
        ]);

        DB::table('userlocations')->insert([
            'user_id' => 3,
            'state_id' => 1,
            'city' => 'Kenai',
        ]);
    }
}
