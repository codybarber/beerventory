<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BreweriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breweries')->insert([
            'untappd_id' => 8509,
            'name' => 'Creaure Comforts Brewing Company',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-8509_7c3bc.jpeg',
            'city' => 'Athens',
            'state' => 13,
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 268965,
            'name' => 'Barebottle Brewing Company',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-268965_56c98.jpeg',
            'city' => 'San Francisco',
            'state' => 6,
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 10188,
            'name' => 'Kenai River Brewing Company',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-KenaiRiverBrewery_10188.jpeg',
            'city' => 'Kenai',
            'state' => 1,
        ]);
    }
}
