<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'books',
            'programming',
            'javascript',
            'aoc',
            'golf',
            'laravel',
            'design patterns'
        ];

        array_map(function($t) {
            Tag::create(['name' => $t]);
        }, $tags);
    }
}
