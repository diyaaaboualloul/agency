@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h3 fw-bold text-white mb-0">📂 Projects</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Add Project</a>
                <a href="{{ route('admin.projects.trash') }}" class="btn btn-outline-light">
                    🗑️ Trash ({{ $trashCount }})
                </a>
            </div>
        </div>

        {{-- Flash message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Service</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td class="fw-bold">{{ $project->title }}</td>
                            <td>{{ $project->service->name ?? '-' }}</td>
                            <td>{{ $project->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Move this project to Trash?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">🗑️ Move to Trash</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">No projects found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center container */
    .content-centered {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Dark glassy overlay */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Table header */
    .custom-table thead {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
    }
    .custom-table th {
        color: #fff !important;
        border: none;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    /* Table body */
    .custom-table td {
        color: #f8f9fa !important;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    /* Hover row effect */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(13, 110, 253, 0.8) !important;
        color: #fff !important;
        transform: scale(1.01);
    }

    /* Buttons inside table */
    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 10px;
    }
</style>
@endpush
