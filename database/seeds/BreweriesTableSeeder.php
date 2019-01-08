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
            'untappd_id' => 265193,
            'name' => 'Calusa Brewing',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-265193_fe63a.jpeg',
            'city' => 'Sarasota',
            'state' => 'FL',
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 5143,
            'name' => 'Russian River Brewing Company',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-russianRiver.jpg',
            'city' => 'Santa Rosa',
            'state' => 'CA',
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 1243,
            'name' => 'Terrapin Beer Co.',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-1243_f9dda.jpeg',
            'city' => 'Athens',
            'state' => 'GA',
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 16434,
            'name' => 'Orpheus Brewing',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-16434_da65b.jpeg',
            'city' => 'Atlanta',
            'state' => 'GA',
        ]);

        DB::table('breweries')->insert([
            'untappd_id' => 106965,
            'name' => 'Whalers Brewing Company',
            'brewery_label' => 'https://untappd.akamaized.net/site/brewery_logos/brewery-106965_1a965.jpeg',
            'city' => 'Wakefield',
            'state' => 'RI',
        ]);
    }
}
