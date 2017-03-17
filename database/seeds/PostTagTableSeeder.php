<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $tags  = Tag::all();

        for ($i=0; $i < count($posts); $i++) { 
            for($k = 0; $k < count($tags); $k++) {
                if (rand(0,10) % 2 === 0) {
                    $posts[$i]->tags()->attach($tags[$k]->id);
                }
            }
        }
    }
}
