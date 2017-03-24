<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\User;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_an_unauthenticated_user_can_see_login_page()
    {
        $this->assertEquals(200, $this->get('/login')->status());
    }

    public function test_an_authenticated_user_cannot_see_login_page()
    {
        $user = factory(User::class)->create();

        Auth::login($user);

        $this->assertEquals(302, $this->get('/login')->status());
    }

    public function test_an_authenticated_user_cannot_submit_login()
    {
        $user = factory(User::class)->create();

        $this->assertEquals(302, $this->post('/login',[
            'email' => $user->email,
            'password' => $user->password,
            '_token' => Session::token()
        ])->status());
    }

    public function test_an_unauthenticated_user_cannot_logout()
    {
        $request = $this->get('/logout');

        $request->assertSee('403');
    }
}
