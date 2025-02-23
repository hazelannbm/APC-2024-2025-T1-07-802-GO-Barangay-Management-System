@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Resident</h2>

        <form action="{{ route('residents.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="household_number">Household Number</label>
                    <input type="text" class="form-control" id="household_number" name="household_number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="civil_status">Civil Status</label>
                    <input type="text" class="form-control" id="civil_status" name="civil_status" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="occupation" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="email" class="form-control" id="email_address" name="email_address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="birth_place">Birth Place</label>
                    <input type="text" class="form-control" id="birth_place" name="birth_place" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion">
                </div>
            </div>
            <div class="form-group">
                <label for="voter_status">Voter Status</label>
                <select class="form-control" id="voter_status" name="voter_status" required>
                    <option value="Registered">Registered</option>
                    <option value="Not Registered">Not Registered</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Resident</button>
        </form>
    </div>
@endsection

