<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterUser
{
    /**
     * Create a new user, log them in and regenerate the session.
     *
     * @param  array<string, mixed>  $attributes
     *
     * @throws ValidationException
     */
    public function __invoke(array $attributes): User
    {
        $validated = Validator::make($attributes, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ])->validate();

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        Session::regenerate();

        return $user;
    }
}
