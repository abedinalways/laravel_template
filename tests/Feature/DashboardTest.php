<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $this->get(route('dashboard'))->assertRedirect(route('login'));
});

test('the dashboard shows the authenticated user', function () {
    $user = User::factory()->create([
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
    ]);

    $this->actingAs($user)->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Ada Lovelace')
        ->assertSee('ada@example.com');
});

test('a user can log out', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
