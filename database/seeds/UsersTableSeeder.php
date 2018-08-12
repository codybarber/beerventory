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
        ]);

        DB::table('users')->insert([
            'name' => 'Ryan Evans',
            'email' => 'ryandavidevans@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Colin Bowker',
            'email' => 'cpbowker@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
