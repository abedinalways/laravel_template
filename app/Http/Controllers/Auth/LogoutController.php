<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LogoutUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    /**
     * Log the user out of the application.
     */
    public function __invoke(LogoutUser $logoutUser): RedirectResponse
    {
        $logoutUser();

        return redirect()->route('login');
    }
}
