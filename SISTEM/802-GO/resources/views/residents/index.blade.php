@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Barangay Residents</h2>
            <a href="{{ route('residents.create') }}" class="btn btn-primary">Add New Resident</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Household #</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($residents as $resident)
                        <tr>
                            <td>{{ $resident->full_name }}</td>
                            <td>{{ $resident->age }}</td>
                            <td>{{ $resident->address }}</td>
                            <td>{{ $resident->contact }}</td>
                            <td>{{ $resident->household_number }}</td>
                            <td>
                                <span class="badge {{ $resident->status === 'Active' ? 'badge-success' : 'badge-danger' }}">
                                    {{ $resident->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('residents.edit', $resident) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('residents.destroy', $resident) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this resident?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No residents found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

