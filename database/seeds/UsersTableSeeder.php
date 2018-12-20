<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cody Barber',
            'email' => 'cody.n.barber@gmail.com',
            'password' => bcrypt('password'),
            'untappdtoken' => '32F1CE9365B690CCAB0449FE2391541F72E624CE',
        ]);

        DB::table('users')->insert([
            'name' => 'Ryan Evans',
            'email' => 'ryandavidevans@gmail.com',
            'password' => bcrypt('password'),
            'untappdtoken' => '',
        ]);

        DB::table('users')->insert([
            'name' => 'Colin Bowker',
            'email' => 'cpbowker@gmail.com',
            'password' => bcrypt('password'),
            'untappdtoken' => '',
        ]);
    }
}
