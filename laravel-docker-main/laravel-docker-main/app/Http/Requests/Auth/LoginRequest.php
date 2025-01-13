<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Validate email and password fields
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Attempt login with the provided email and password
        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Increment the rate limiter on failed attempts
            RateLimiter::hit($this->throttleKey());

            // Throw validation error if authentication fails
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // Clear the rate limiter on successful login
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate-limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // Trigger lockout event if rate limit is exceeded
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate-limiting key for the request.
     */
    public function throttleKey(): string
    {
        // Apply transliteration to handle special characters in the email
        return Str::transliterate(Str::lower($this->input('email'))) . '|' . $this->ip();
    }
}
