<?php


namespace Auth;


use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function login_route_up()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function login_displays_validation_errors()
    {
        $response = $this->post(route('login'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function login_authenticates_and_redirects_user()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
        //var_dump($response);
        //$response->assertRedirect('/admin/home');
        $this->assertAuthenticatedAs($user);
    }
}
