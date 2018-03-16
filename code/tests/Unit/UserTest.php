<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
{
    public function testUserCannotLoginWithWrongPassword(){
        // Given a registered user
        $user = factory(User::class)->create();
        // When I log in with a correct username and a wrong password
        $response = $this->post('/login', [
            "name" => $user->name,
            "password" => "ThisStringDoesNotMatch"
        ]);
        // Then I am not logged in
        $this->assertGuest();
        // and I am redirected to the login page with errors
        $response->assertSessionHasErrors(['authenticate' => 'Could not authenticate user.']);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
