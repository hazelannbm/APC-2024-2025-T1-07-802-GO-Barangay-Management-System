<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Render the login page located in 'resources/views/auth/login.blade.php'
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate and authenticate the user credentials
        $request->authenticate();

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Redirect the user to their intended page (or the dashboard by default)
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Destroy an authenticated session (logout).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log the user out of the application
        Auth::guard('web')->logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Generate a new CSRF token to prevent session hijacking
        $request->session()->regenerateToken();

        // Redirect the user to the homepage
        return redirect('/');
    }
}
