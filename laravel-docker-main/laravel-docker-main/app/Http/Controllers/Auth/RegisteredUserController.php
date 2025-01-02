<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'age' => ['required', 'integer', 'min:0'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'in:single,married,widowed,divorced'],
            'religion' => ['nullable', 'string', 'max:255'],
            'spouse_name' => ['nullable', 'string', 'max:255'],
            'siblings_name' => ['nullable', 'string', 'max:255'],
            'children_name' => ['nullable', 'string', 'max:255'],
            'valid_id' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Handle the file upload
        $validIdPath = $request->file('valid_id')->store('valid-ids', 'public');

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'civil_status' => $request->civil_status,
            'religion' => $request->religion,
            'spouse_name' => $request->spouse_name,
            'siblings_name' => $request->siblings_name,
            'children_name' => $request->children_name,
            'valid_id' => $validIdPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
