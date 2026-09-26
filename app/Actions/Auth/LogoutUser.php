<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutUser
{
    /**
     * Log the current user out and invalidate their session.
     */
    public function __invoke(): void
    {
        Auth::logout();

        Session::invalidate();
        Session::regenerateToken();
    }
}
