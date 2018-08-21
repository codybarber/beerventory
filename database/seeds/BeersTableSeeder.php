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
            'brewery_name' => 'Creature Comforts Brewing Company',
            'brewery_untappd_id' => 8509,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-829349_175e9_sm.jpeg',
            'style' => 'Sour/Gose',
            'year' => 2018,
            'abv' => 4.5,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 2745111,
            'name' => 'Secret Bromance',
            'brewery_name' => 'Barebottle Brewing Company',
            'brewery_untappd_id' => 268965,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-2745111_d76b9_sm.jpeg',
            'style' => 'IPA - New England',
            'year' => 2018,
            'abv' => 6.4,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 71492,
            'name' => 'Sunken Island IPA',
            'brewery_name' => 'Kenai River Brewing Company',
            'brewery_untappd_id' => 10188,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos/beer-SunkenIslandIPA_71492.jpeg',
            'style' => 'IPA - English',
            'year' => 2018,
            'abv' => 6.8,
            'value' => null,
        ]);
    }
}
