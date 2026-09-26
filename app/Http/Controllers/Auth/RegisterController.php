<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Create a new user account.
     *
     * @throws ValidationException
     */
    public function store(Request $request, RegisterUser $registerUser): RedirectResponse
    {
        $registerUser($request->only('name', 'email', 'password', 'password_confirmation'));

        return redirect()->intended(route('dashboard'));
    }
}
