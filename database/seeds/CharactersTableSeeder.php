<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CharactersTableSeeder extends Seeder
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
	        DB::table('characters')->insert([
	            'name' => $faker->name,
	            'series_id' => rand(1,10),
	        ]);
        }
    }
}
