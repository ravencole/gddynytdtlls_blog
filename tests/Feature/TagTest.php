<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tag;
use App\Post;

class TagTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_see_posts_associated_with_a_tag()
    {
        $tag = factory(Tag::class)->create();
        $postTitles = factory(Post::class, 5)
                    ->create()
                    ->map(function($p) use ($tag) {
                        $p->tags()->attach($tag);
                        return $p->title;
                    });

        $request = $this->get('/tag/'.$tag->name);

        $postTitles->each(function($title) use ($request) {
            $request->assertSee($title);
        });
    }
}
