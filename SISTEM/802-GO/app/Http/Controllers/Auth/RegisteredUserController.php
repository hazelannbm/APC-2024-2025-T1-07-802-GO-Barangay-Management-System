<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'age' => ['required', 'integer', 'min:0'],
            'birthdate' => ['required', 'date'],
            'block_street' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'in:single,married,widowed,divorced'],
            'religion' => ['nullable', 'string', 'max:255'],
            'spouse_name' => ['nullable', 'string', 'max:255'],
            'siblings_name' => ['nullable', 'string', 'max:255'],
            'children_name' => ['nullable', 'string', 'max:255'],
            'valid_id' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validIdPath = $request->file('valid_id')->store('valid-ids', 'public');

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'birthdate' => $request->birthdate,
            'block_street' => $request->block_street,
            'barangay' => $request->barangay,
            'district' => $request->district,
            'city' => $request->city,
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

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
