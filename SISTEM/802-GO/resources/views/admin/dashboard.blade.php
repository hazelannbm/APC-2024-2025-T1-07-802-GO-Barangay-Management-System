@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Admin Dashboard</h2>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.residents.index') }}">Barangay Residents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manage News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Document Approval</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-4">
            @yield('admin-content')
        </div>
    </div>
@endsection
