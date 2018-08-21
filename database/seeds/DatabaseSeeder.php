<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BreweriesTableSeeder::class);
        $this->call(BeersTableSeeder::class);
        $this->call(UserlocationsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
    }
}
