<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Post;
use App\User;

class PostTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->post = factory(Post::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function test_a_user_can_see_a_post()
    {
        $this->get($this->post->present()->url)
             ->assertSee($this->post->title);
    }

    public function test_an_unauthenticated_user_cannot_see_create_post_form()
    {
        $this->get('/post/create')->assertStatus(302);
    }

    public function test_an_authenticated_user_can_see_create_post_form()
    {
        $this->be($this->user);
        $this->get('/post/create')->assertStatus(200);
    }

    public function test_an_authenticated_user_can_submit_a_new_post()
    {
        $this->be($this->user);

        $this->post('/post', [
            'title' => $this->post->title,
            'body' => $this->post->body,
            '_token' => Session::token()
        ])->assertStatus(302);

        $this->assertDatabaseHas('posts', ['title' => $this->post->title]);
    }

    public function test_an_authenticated_user_can_see_edit_post_form()
    {
        $this->be($this->user);
        $this->get('/post/'.$this->post->id.'/edit')->assertStatus(200);
    }

    public function test_an_unauthenticated_user_cannot_see_edit_post_form()
    {
        $this->get('/post/'.$this->post->id.'/edit')->assertStatus(302);
    }

    public function test_an_authenticated_user_can_submit_edited_post()
    {
        $this->be($this->user);

        $this->patch('/post/'.$this->post->id ,[
            'body' => 'new post body',
            'title' => 'new post title',
            '_token' => Session::token()
        ])->assertStatus(302);

        $this->assertDatabaseHas('posts',['title'=>'new post title']);
    }

    public function test_an_unauthenticated_user_cannot_submit_edited_post()
    {
        $this->patch('/post/'.$this->post->id ,[
            'body' => 'new post body',
            'title' => 'new post title',
            '_token' => Session::token()
        ])->assertRedirect('/login');
    }

    public function test_an_authenticated_user_can_delete_post()
    {
        $this->be($this->user);

        $this->delete('/post/'.$this->post->id ,[
            '_token' => Session::token()
        ])->assertStatus(302);

        $this->assertDatabaseMissing('posts',['id'=>$this->post->id]);
    }

    public function test_an_unauthenticated_user_cannot_delete_post()
    {
        $this->delete('/post/'.$this->post->id ,[
            '_token' => Session::token()
        ])->assertRedirect('/login');

        $this->assertDatabaseHas('posts',['id'=>$this->post->id]);
    }
}
