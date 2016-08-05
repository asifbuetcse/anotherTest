<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ThreadsTableSeeder extends Seeder
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
	        DB::table('threads')->insert([
	            'details' => $faker->text,
	        ]);
        }
    }
}
