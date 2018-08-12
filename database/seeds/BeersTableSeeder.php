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
            'name' => 'Tritonia',
            'brewery' => 'Creaure Comforts Brewing Company',
            'style' => 'Sour/Gose',
            'year' => 2018,
            'abv' => 4.5,
            'value' => null,
            'purchase_date' => Carbon::parse('2018-05-15'),
            'purchase_location' => 'Brewery',
            'purchase_location_city' => 'Athens',
            'purchase_location_state' => 13,
            'url_image' => 'https://untappd.akamaized.net/site/beer_logos/beer-829349_175e9_sm.jpeg',
            'url_untappd' => 'https://untappd.com/b/creature-comforts-brewing-company-tritonia-with-cucumber-and-lime/829349',
            'url_ratebeer' => 'https://www.ratebeer.com/beer/creature-comforts-tritonia/271948/',
        ]);

        DB::table('beers')->insert([
          'name' => 'Secret Bromance',
          'brewery' => 'Barebottle Brewing Company',
          'style' => 'IPA - New England',
          'year' => 2018,
          'abv' => 6.4,
          'value' => null,
          'purchase_date' => Carbon::parse('2018-08-10'),
          'purchase_location' => 'SPiN Social Club',
          'purchase_location_city' => 'San Francisco',
          'purchase_location_state' => 6,
          'url_image' => 'https://untappd.akamaized.net/site/beer_logos/beer-2745111_d76b9_sm.jpeg',
          'url_untappd' => 'https://untappd.com/b/barebottle-brewing-company-secret-bromance/2745111',
          'url_ratebeer' => null,
        ]);

        DB::table('beers')->insert([
          'name' => 'Sunken Island IPA',
          'brewery' => 'Kenai River Brewing Company',
          'style' => 'IPA - English',
          'year' => 2018,
          'abv' => 6.8,
          'value' => null,
          'purchase_date' => Carbon::parse('2018-06-10'),
          'purchase_location' => 'Brewery',
          'purchase_location_city' => 'Kenai',
          'purchase_location_state' => 1,
          'url_image' => 'https://untappd.akamaized.net/site/beer_logos/beer-SunkenIslandIPA_71492.jpeg',
          'url_untappd' => 'https://untappd.com/b/kenai-river-brewing-company-sunken-island-ipa/71492',
          'url_ratebeer' => null,
        ]);
    }
}
