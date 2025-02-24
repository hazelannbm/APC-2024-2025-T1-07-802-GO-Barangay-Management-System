@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Resident</h2>

        <form action="{{ route('residents.update', $resident) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $resident->full_name }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $resident->age }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $resident->address }}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $resident->contact }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="household_number">Household Number</label>
                    <input type="text" class="form-control" id="household_number" name="household_number" value="{{ $resident->household_number }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" {{ $resident->status === 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $resident->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" {{ $resident->gender === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $resident->gender === 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="civil_status">Civil Status</label>
                    <input type="text" class="form-control" id="civil_status" name="civil_status" value="{{ $resident->civil_status }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $resident->occupation }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="email" class="form-control" id="email_address" name="email_address" value="{{ $resident->email_address }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $resident->birth_date->format('Y-m-d') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="birth_place">Birth Place</label>
                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ $resident->birth_place }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $resident->nationality }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" value="{{ $resident->religion }}">
                </div>
            </div>
            <div class="form-group">
                <label for="voter_status">Voter Status</label>
                <select class="form-control" id="voter_status" name="voter_status" required>
                    <option value="Registered" {{ $resident->voter_status === 'Registered' ? 'selected' : '' }}>Registered</option>
                    <option value="Not Registered" {{ $resident->voter_status === 'Not Registered' ? 'selected' : '' }}>Not Registered</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Resident</button>
        </form>
    </div>
@endsection

