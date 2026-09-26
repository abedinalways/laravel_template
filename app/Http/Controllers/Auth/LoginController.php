<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @throws ValidationException
     */
    public function store(Request $request, LoginUser $loginUser): RedirectResponse
    {
        $loginUser(
            $request->only('email', 'password'),
            $request->boolean('remember'),
        );

        return redirect()->intended(route('dashboard'));
    }
}
