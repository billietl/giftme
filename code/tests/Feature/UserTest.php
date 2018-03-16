<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
{
    protected $faker;
    public function setup()
    {
        parent::setup();
        $this->faker = Faker::create();
    }
    public function testNewUserCantSignupWithExistingName()
    {
        // Given an already signed up user
        $existingUser = factory(User::class)->create();
        // When I create an account with the same name
        $newUser = factory(User::class)->make();
        $response = $this->post('/signup', [
            'name' => $existingUser->name,
            'email' => $newUser->email,
            'password' => $newUser->password,
            'password_confirmation' => $newUser->password
        ]);
        // Then I have an error message about existing user name
        $response->assertSessionHasErrors(['existingName']);
    }
    public function testClearPasswordsAreStoredHashed()
    {
        // Given a cleartext password
        $password = $this->faker->password();
        // When I use it to signup a user
        $user = factory(User::class)->make();
        $response = $this->post('/signup', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password
        ]);
        // Then the stored password is not the cleartext password
        $user = User::find($user->id);
        $this->assertNotEquals($user['password'], $password);
    }
    public function testLoggedInUserCanLogout()
    {
        // Given I am logged in as a signuped user
        $user = factory(User::class)->create();
        auth()->login($user);
        // When I log out
        $response = $this->get('/logout');
        // Then I am no longer authenticated
        $this->assertGuest();
        // and I am redirected to the home page
        $response->assertRedirect('/');
    }
    public function testUserCannotLoginWithWrongPassword()
    {
        // Given I am a signuped user
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
    public function testAuthenticatedUserCannotSeeLoginPage()
    {
        // Given I am an authenticated user
        $user = factory(User::class)->create();
        auth()->login($user);
        // When I go to the login page
        $response = $this->get('/login');
        // Then I am redirected to the home page
        $response->assertRedirect('/');
    }
    public function testAuthenticatedUserCannotSeesignupPage()
    {
        // Given I am a signuped user
        $user = factory(User::class)->create();
        auth()->login($user);
        // and I have another acount
        $otherUser = factory(User::class)->create();
        // When I try to log in
        $response = $this->post('/login', [
            "name" => $otherUser->name,
            "password" => $otherUser->password
        ]);
        // Then I am redirected to the home page
        $response->assertRedirect('/');
        // and I am still authenticated with the first user
        $this->assertAuthenticatedAs($user);
    }
    public function testAuthenticatedUserCannotLogInAgain()
    {
        // Given I am an authenticated user
        $user = factory(User::class)->create();
        auth()->login($user);
        // When I go to the login page
        $response = $this->get('/login');
        // Then I am redirected to the home page
        $response->assertRedirect('/');
    }
    public function testAuthenticatedUserCannotsignupAgain()
    {
        // Given I am a signuped user
        $user = factory(User::class)->create();
        auth()->login($user);
        // When I try to signup a new account
        $otherUser = factory(User::class)->make();
        $form = [
            "name" => $otherUser->name,
            "email" => $otherUser->email,
            "password" => $otherUser->password
        ];
        $response = $this->post('/signup', $form);
        // Then I am redirected to the home page
        $response->assertRedirect('/');
        // and the new account is not created
        $this->assertDatabaseMissing('users', $form);
    }
}
