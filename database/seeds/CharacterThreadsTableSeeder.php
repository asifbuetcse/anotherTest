<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CharacterThreadsTableSeeder extends Seeder
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
	        DB::table('thread_characters')->insert([
	            'thread_id' => rand(1,10),
	            'character_id' => rand(1,10),
	        ]);
        }
    }
}
