<?php


namespace Auth;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class AuthTest extends TestCase
{
    /** @test */
    public function can_login_into_app()
    {
        $response = $this->withSession(['email' => 'admin@dimacros.net', 'password' => '951753'])->get('/');
        $response
            ->assertStatus(200)
            ->assertSessionDoesntHaveErrors();
//        $response = $this->json('POST', '/login', ['email' => 'admin@dimacros.net', 'password' => '951753']);
//
//        $response
//            ->assertStatus(201)
//            ->assertExactJson([
//                'created' => true,
//            ]);

    }

}
