<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // Custom login request for validation
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Return the login view, this is where the login form is shown
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
        // The LoginRequest is used for validating the incoming login credentials
        // If validation fails, it will automatically redirect back with errors
        $request->authenticate();

        // After successful login, regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Redirect the user to their intended page, or to the dashboard if none is specified
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
        // Logout the user using the 'web' guard
        Auth::guard('web')->logout();

        // Invalidate the session to ensure no session hijacking can occur
        $request->session()->invalidate();

        // Regenerate the session token to further protect against session fixation attacks
        $request->session()->regenerateToken();

        // Redirect the user to the homepage (or a custom route like '/login' if needed)
        return redirect('/');
    }
}
