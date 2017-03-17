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
        factory(\App\User::class)->create([
            'name' => 'raven cole',
            'email' => 'ravenscole@gmail.com',
            'password' => bcrypt('password')
        ]);
        $this->call(TagSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
    }
}
