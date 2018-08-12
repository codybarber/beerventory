<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 1,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 3,
        ]);

        DB::table('collections')->insert([
            'user_id' => 2,
            'beer_id' => 2,
        ]);

        DB::table('collections')->insert([
            'user_id' => 2,
            'beer_id' => 1,
        ]);

        DB::table('collections')->insert([
            'user_id' => 3,
            'beer_id' => 3,
        ]);

        DB::table('collections')->insert([
            'user_id' => 3,
            'beer_id' => 2,
        ]);
    }
}
