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
            'untappd_id' => 2453290,
            'quantity' => 6,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 3,
            'untappd_id' => 4499,
            'quantity' => 7,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 4,
            'untappd_id' => 1105113,
            'quantity' => 3,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 5,
            'untappd_id' => 1519133,
            'quantity' => 6,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 7,
            'untappd_id' => 366627,
            'quantity' => 2,
        ]);

        DB::table('collections')->insert([
            'user_id' => 1,
            'beer_id' => 6,
            'untappd_id' => 1837890,
            'quantity' => 12,
        ]);


        DB::table('collections')->insert([
            'user_id' => 2,
            'beer_id' => 2,
            'untappd_id' => 1593469,
            'quantity' => 2,
        ]);

        DB::table('collections')->insert([
            'user_id' => 2,
            'beer_id' => 1,
            'untappd_id' => 2453290,
            'quantity' => 1,
        ]);

        DB::table('collections')->insert([
            'user_id' => 3,
            'beer_id' => 3,
            'untappd_id' => 4499,
            'quantity' => 4,
        ]);

        DB::table('collections')->insert([
            'user_id' => 3,
            'beer_id' => 2,
            'untappd_id' => 1593469,
            'quantity' => 7,
        ]);
    }
}
