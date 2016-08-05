<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
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
	        DB::table('comments')->insert([
	        	'body' => $faker->sentence,
	            'thread_id' => rand(1,10),
	            'user_id' => rand(1,10),
	        ]);
        }
    }
}
