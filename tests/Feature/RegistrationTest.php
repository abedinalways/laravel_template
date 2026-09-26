<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('the registration page can be rendered', function () {
    $this->get(route('register'))->assertOk();
});

test('a visitor can register and is logged in', function () {
    $response = $this->post(route('register'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'password' => 'password-123',
        'password_confirmation' => 'password-123',
    ]);

    $user = User::where('email', 'ada@example.com')->firstOrFail();

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($user);
    $this->assertSame('Ada Lovelace', $user->name);
    $this->assertTrue(Hash::check('password-123', $user->password));
});

test('registration fails when the email is already taken', function () {
    User::factory()->create(['email' => 'ada@example.com']);

    $this->post(route('register'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'password' => 'password-123',
        'password_confirmation' => 'password-123',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('registration fails when the password is not confirmed', function () {
    $this->post(route('register'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'password' => 'password-123',
        'password_confirmation' => 'different-password',
    ])->assertSessionHasErrors('password');

    $this->assertGuest();
    $this->assertDatabaseCount('users', 0);
});
