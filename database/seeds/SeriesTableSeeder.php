<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('series')->insert([
	            'name' => $faker->name,
	        ]);
        }
    }
}
