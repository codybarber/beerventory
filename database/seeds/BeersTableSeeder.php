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
            'untappd_id' => 2453290,
            'name' => 'Even Further',
            'brewery_name' => 'Calusa Brewing',
            'brewery_untappd_id' => 265193,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-2453290_2ff5c_hd.jpeg',
            'style' => 'IPA - Imperial / Double New England',
            'year' => 2018,
            'abv' => 8.5,
            'rating' => 4.07,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 2356077,
            'name' => 'Tritonia With Mango, Orange, & Lime',
            'brewery_name' => 'Creature Comforts Brewing Company',
            'brewery_untappd_id' => 8509,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-2356077_ca929_hd.jpeg',
            'style' => 'Sour - Gose',
            'year' => 2018,
            'abv' => 4.50,
            'rating' => 4.23,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 1593469,
            'name' => 'Focus',
            'brewery_name' => 'Calusa Brewing',
            'brewery_untappd_id' => 265193,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-1593469_bb407_hd.jpeg',
            'style' => 'IPA - New England',
            'year' => 2018,
            'abv' => 7.50,
            'rating' => 4.07,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 4499,
            'name' => 'Pliny the Elder',
            'brewery_name' => 'Russian River Brewing Company',
            'brewery_untappd_id' => 5143,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-4499_24493_hd.jpeg',
            'style' => 'IPA - Imperial / Double',
            'year' => 2018,
            'abv' => 8.00,
            'rating' => 4.54,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 1105113,
            'name' => 'Liquid Lunch',
            'brewery_name' => 'Terrapin Beer Co.',
            'brewery_untappd_id' => 1243,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-1105113_67ae3_hd.jpeg',
            'style' => 'Porter - American',
            'year' => 2018,
            'abv' => 7.70,
            'rating' => 3.54,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 1519133,
            'name' => 'Rise',
            'brewery_name' => 'Whalers Brewing Company',
            'brewery_untappd_id' => 106965,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-1519133_b90fb_hd.jpeg',
            'style' => 'Pale Ale - American',
            'year' => 2018,
            'abv' => 5.50,
            'rating' => 3.72,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 1837890,
            'name' => 'Nebula',
            'brewery_name' => 'Whalers Brewing Company',
            'brewery_untappd_id' => 106965,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-1837890_f113b_hd.jpeg',
            'style' => 'Sour - Berliner Weisse',
            'year' => 2018,
            'abv' => 5.00,
            'rating' => 3.93,
            'value' => null,
        ]);

        DB::table('beers')->insert([
            'untappd_id' => 366627,
            'name' => 'Serpent Bite',
            'brewery_name' => 'Orpheus Brewing',
            'brewery_untappd_id' => 16434,
            'beer_label' => 'https://untappd.akamaized.net/site/beer_logos_hd/beer-366627_20ab5_hd.jpeg',
            'style' => 'Sour - Ale',
            'year' => 2018,
            'abv' => 6.00,
            'rating' => 3.81,
            'value' => null,
        ]);

    }
}
