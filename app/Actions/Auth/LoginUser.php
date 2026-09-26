<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginUser
{
    /**
     * Authenticate a user from the given credentials and regenerate the session.
     *
     * @param  array<string, mixed>  $credentials
     *
     * @throws ValidationException
     */
    public function __invoke(array $credentials, bool $remember = false): void
    {
        $validated = Validator::make($credentials, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ])->validate();

        if (! Auth::attempt($validated, $remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        Session::regenerate();
    }
}
