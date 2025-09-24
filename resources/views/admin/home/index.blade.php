@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        <h2 class="h4 mb-0 text-white">🏠 Manage Homepage Sections</h2>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-info my-3">
            👀 View Home Page
        </a>

        <div class="card-body table-overlay mt-4">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Heading</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td class="fw-bold text-capitalize">{{ $section->section_key }}</td>
                            <td>{{ $section->heading ?? '-' }}</td>
                            <td>
                                @if($section->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.home.edit', $section->id) }}" class="btn btn-sm btn-primary">
                                    ✏️ Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Centered container */
    .content-centered {
        max-width: 1000px; /* control page width */
        margin: 40px auto; /* center horizontally + space from top */
        padding: 0 20px; /* safe spacing on small screens */
    }

    /* Black glassy overlay */
    .table-overlay {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(6px);
    }

    /* Table header styling */
    .custom-table thead {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
    }
    .custom-table th {
        color: #fff !important;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Table rows */
    .custom-table td {
        color: #f8f9fa !important;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    /* Hover effect */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(13, 110, 253, 0.8) !important;
        color: #fff !important;
        transform: scale(1.01);
    }

    /* Badges */
    .badge {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
</style>
@endpush
