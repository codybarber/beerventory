<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beers')->insert([
            'untappd_id' => 271948,
            'name' => 'Tritonia',
            'brewery' => 1,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-829349_175e9_sm.jpeg',
            'style' => 'Sour/Gose',
            'year' => 2018,
            'abv' => 4.5,
            'value' => null,
            'purchase_date' => Carbon::parse('2018-05-15'),
            'purchase_location' => 'Brewery',
            'purchase_location_city' => 'Athens',
            'purchase_location_state' => 13,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 2745111,
            'name' => 'Secret Bromance',
            'brewery' => 2,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-2745111_d76b9_sm.jpeg',
            'style' => 'IPA - New England',
            'year' => 2018,
            'abv' => 6.4,
            'value' => null,
            'purchase_date' => Carbon::parse('2018-08-10'),
            'purchase_location' => 'SPiN Social Club',
            'purchase_location_city' => 'San Francisco',
            'purchase_location_state' => 6,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 71492,
            'name' => 'Sunken Island IPA',
            'brewery' => 3,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-SunkenIslandIPA_71492.jpeg',
            'style' => 'IPA - English',
            'year' => 2018,
            'abv' => 6.8,
            'value' => null,
            'purchase_date' => Carbon::parse('2018-06-10'),
            'purchase_location' => 'Brewery',
            'purchase_location_city' => 'Kenai',
            'purchase_location_state' => 1,
        ]);
    }
}
