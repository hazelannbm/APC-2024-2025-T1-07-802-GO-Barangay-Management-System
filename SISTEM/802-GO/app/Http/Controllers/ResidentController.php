<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('admindashboard.manageresident', compact('admindashboard'));
    }

    public function create()
    {
        return view('admindashboard.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string',
            'contact' => 'required|string',
            'household_number' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|string',
            'occupation' => 'required|string',
            'email_address' => 'nullable|email',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'nullable|string',
            'voter_status' => 'required|in:Registered,Not Registered',
        ]);

        Resident::create($validated);

        return redirect()->route('residents.index')->with('success', 'Resident added successfully');
    }

    public function edit(Resident $resident)
    {
        return view('residents.edit', compact('resident'));
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string',
            'contact' => 'required|string',
            'household_number' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|string',
            'occupation' => 'required|string',
            'email_address' => 'nullable|email',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'nullable|string',
            'voter_status' => 'required|in:Registered,Not Registered',
        ]);

        $resident->update($validated);

        return redirect()->route('residents.index')->with('success', 'Resident updated successfully');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully');
    }
}

