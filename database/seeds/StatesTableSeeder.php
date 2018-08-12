<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(['name' => 'Alaska', 'code' => 'AK']);
        DB::table('states')->insert(['name' => 'Alabama', 'code' => 'AL']);
        DB::table('states')->insert(['name' => 'American Samoa', 'code' => 'AS']);
        DB::table('states')->insert(['name' => 'Arizona', 'code' => 'AZ']);
        DB::table('states')->insert(['name' => 'Arkansas', 'code' => 'AR']);
        DB::table('states')->insert(['name' => 'California', 'code' => 'CA']);
        DB::table('states')->insert(['name' => 'Colorado', 'code' => 'CO']);
        DB::table('states')->insert(['name' => 'Connecticut', 'code' => 'CT']);
        DB::table('states')->insert(['name' => 'Delaware', 'code' => 'DE']);
        DB::table('states')->insert(['name' => 'District of Columbia', 'code' => 'DC']);
        DB::table('states')->insert(['name' => 'Federated DBs of Micronesia', 'code' => 'FM']);
        DB::table('states')->insert(['name' => 'Florida', 'code' => 'FL']);
        DB::table('states')->insert(['name' => 'Georgia', 'code' => 'GA']);
        DB::table('states')->insert(['name' => 'Guam', 'code' => 'GU']);
        DB::table('states')->insert(['name' => 'Hawaii', 'code' => 'HI']);
        DB::table('states')->insert(['name' => 'Idaho', 'code' => 'ID']);
        DB::table('states')->insert(['name' => 'Illinois', 'code' => 'IL']);
        DB::table('states')->insert(['name' => 'Indiana', 'code' => 'IN']);
        DB::table('states')->insert(['name' => 'Iowa', 'code' => 'IA']);
        DB::table('states')->insert(['name' => 'Kansas', 'code' => 'KS']);
        DB::table('states')->insert(['name' => 'Kentucky', 'code' => 'KY']);
        DB::table('states')->insert(['name' => 'Louisiana', 'code' => 'LA']);
        DB::table('states')->insert(['name' => 'Maine', 'code' => 'ME']);
        DB::table('states')->insert(['name' => 'Marshall Islands', 'code' => 'MH']);
        DB::table('states')->insert(['name' => 'Maryland', 'code' => 'MD']);
        DB::table('states')->insert(['name' => 'Massachusetts', 'code' => 'MA']);
        DB::table('states')->insert(['name' => 'Michigan', 'code' => 'MI']);
        DB::table('states')->insert(['name' => 'Minnesota', 'code' => 'MN']);
        DB::table('states')->insert(['name' => 'Mississippi', 'code' => 'MS']);
        DB::table('states')->insert(['name' => 'Missouri', 'code' => 'MO']);
        DB::table('states')->insert(['name' => 'Montana', 'code' => 'MT']);
        DB::table('states')->insert(['name' => 'Nebraska', 'code' => 'NE']);
        DB::table('states')->insert(['name' => 'Nevada', 'code' => 'NV']);
        DB::table('states')->insert(['name' => 'New Hampshire', 'code' => 'NH']);
        DB::table('states')->insert(['name' => 'New Jersey', 'code' => 'NJ']);
        DB::table('states')->insert(['name' => 'New Mexico', 'code' => 'NM']);
        DB::table('states')->insert(['name' => 'New York', 'code' => 'NY']);
        DB::table('states')->insert(['name' => 'North Carolina', 'code' => 'NC']);
        DB::table('states')->insert(['name' => 'North Dakota', 'code' => 'ND']);
        DB::table('states')->insert(['name' => 'Northern Mariana Islands', 'code' => 'MP']);
        DB::table('states')->insert(['name' => 'Ohio', 'code' => 'OH']);
        DB::table('states')->insert(['name' => 'Oklahoma', 'code' => 'OK']);
        DB::table('states')->insert(['name' => 'Oregon', 'code' => 'OR']);
        DB::table('states')->insert(['name' => 'Palau', 'code' => 'PW']);
        DB::table('states')->insert(['name' => 'Pennsylvania', 'code' => 'PA']);
        DB::table('states')->insert(['name' => 'Puerto Rico', 'code' => 'PR']);
        DB::table('states')->insert(['name' => 'Rhode Island', 'code' => 'RI']);
        DB::table('states')->insert(['name' => 'South Carolina', 'code' => 'SC']);
        DB::table('states')->insert(['name' => 'South Dakota', 'code' => 'SD']);
        DB::table('states')->insert(['name' => 'Tennessee', 'code' => 'TN']);
        DB::table('states')->insert(['name' => 'Texas', 'code' => 'TX']);
        DB::table('states')->insert(['name' => 'Utah', 'code' => 'UT']);
        DB::table('states')->insert(['name' => 'Vermont', 'code' => 'VT']);
        DB::table('states')->insert(['name' => 'Virgin Islands', 'code' => 'VI']);
        DB::table('states')->insert(['name' => 'Virginia', 'code' => 'VA']);
        DB::table('states')->insert(['name' => 'Washington', 'code' => 'WA']);
        DB::table('states')->insert(['name' => 'West Virginia', 'code' => 'WV']);
        DB::table('states')->insert(['name' => 'Wisconsin', 'code' => 'WI']);
        DB::table('states')->insert(['name' => 'Wyoming', 'code' => 'WY']);
        DB::table('states')->insert(['name' => 'Armed Forces Africa', 'code' => 'AE']);
        DB::table('states')->insert(['name' => 'Armed Forces Americas (except Canada)', 'code' => 'AA']);
        DB::table('states')->insert(['name' => 'Armed Forces Canada', 'code' => 'AE']);
        DB::table('states')->insert(['name' => 'Armed Forces Europe', 'code' => 'AE']);
        DB::table('states')->insert(['name' => 'Armed Forces Middle East', 'code' => 'AE']);
        DB::table('states')->insert(['name' => 'Armed Forces Pacific', 'code' => 'AP']);
    }
}
