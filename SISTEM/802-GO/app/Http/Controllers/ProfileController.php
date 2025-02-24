<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input fields
        $validatedData = $request->validate([
            'first_name'   => 'required|string|max:255',
            'middle_name'  => 'nullable|string|max:255',
            'last_name'    => 'required|string|max:255',
            'gender'       => 'required|in:male,female,other',
            'age'          => 'required|integer|min:1|max:120',
            'birthdate'    => 'required|date',
            'block_street' => 'required|string|max:255',
            'barangay'     => 'required|string|max:255',
            'district'     => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'religion'     => 'nullable|string|max:255',
            'valid_id'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Max 2MB file
        ]);

        // Handle valid ID file upload
        if ($request->hasFile('valid_id')) {
            if ($user->valid_id) {
                Storage::disk('public')->delete($user->valid_id); // ✅ Corrected: Delete old ID if exists
            }
            $validatedData['valid_id'] = $request->file('valid_id')->store('valid_ids', 'public');
        }

        // Update user details
        $user->update($validatedData);

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}