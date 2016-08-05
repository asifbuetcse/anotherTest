<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(CharactersTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(ThreadUsersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CharacterThreadsTableSeeder::class);
    }
}
