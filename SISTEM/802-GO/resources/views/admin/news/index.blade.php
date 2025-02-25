@extends('layouts.app')
<style>
    /* Container Styling */
    .container {
        max-width: 100%;
        padding: 20px;
    }

    /* Card Styling */
    .card {
        border-radius: 10px;
        border: 1px solid #ddd;
        overflow: hidden;
    }

    .card-body {
        padding: 0 !important;
    }

    /* Table Styling */
    .table {
        width: 100%;
        margin: 0; /* Remove default margin */
        border-collapse: collapse; /* Ensure borders are properly aligned */
    }

    .table th, .table td {
        padding: 12px;
        vertical-align: middle;
        text-align: center;
        white-space: nowrap; /* Prevents text wrapping */
    }

    .table thead {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Search Box */
    .search-box input {
        width: 250px;
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 8px 12px;
    }

    /* Button Styling */
    .btn {
        border-radius: 5px;
        font-weight: 500;
        color: white;
    }

    .btn-primary {
        background-color: #11468F; /* Matches the blue button in the image */
        border-color: #11468F;
    }

    .btn-primary:hover {
        background-color: #0D3A73;
    }

    .btn-warning {
        background-color:#bebbb2;
        color: black;
    }

    .btn-danger {
        background-color:#bebbb2;
        color: black;
    }

    /* Badges */
    .badge {
        padding: 5px 10px;
        font-size: 0.85rem;
    }

    h1 {
        font-size: 3rem; /* Increased font size */
        font-weight: bold;
    }

    /* Make the Add News Button Bigger */
    .btn-lg {
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Buttons Styling */
    .btn-md {
        font-size: 1rem;
        padding: 10px 20px;
    }

    /* Make Buttons Side by Side */
    td .btn {
        display: inline-block;
        width: 100px;
        text-align: center;
    }

    /* Align Add News Button to the Right */
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .search-container {
            display: flex;
            align-items: center;
            position: relative;
            width: 50%;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px 0 0 8px; /* Rounded corners for the left side */
            font-size: 16px;
            outline: none;
        }

        .search-input:focus {
            border-color: #007bff;
        }

        .search-button {
            background: none;
            border: 1px solid #ccc;
            border-left: none;
            border-radius: 0 8px 8px 0; /* Rounded corners for the right side */
            padding: 10px;
            cursor: pointer;
            color: gray;
            outline: none;
        }

        .search-button:hover {
            color: black;
            border-color: #007bff;
        }
</style>

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="header-container mb-4">
        <h1 class="fw-bold" style="font-size: 3rem; font-weight: bold;">News Management</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-lg btn-primary px-4 py-2">
            <i class="fas fa-plus"></i> Add New News
        </a>
    </div>

<form method="GET" action="{{ route('admin.news.index') }}" class="mb-3 w-25">
        <div class="search-container">
            <input type="text" name="search" class="form-control search-input" placeholder="Search news..." value="{{ request('search') }}">
            <button type="submit" class="search-button">
                <i class="fas fa-search">Search</i>
            </button>
        </div>
</form>

    <!-- Table -->
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered text-center w-100 m-0">
                <thead class="table-light">
                    <tr>
                        <th>News ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>
                                <span class="badge bg-success">Published</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-md btn-warning px-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-md btn-danger px-3">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">No news found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection