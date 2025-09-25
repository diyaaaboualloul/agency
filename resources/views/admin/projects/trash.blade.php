@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h3 fw-bold text-white">🗑️ Projects — Trash</h2>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-info">← Back to Projects</a>
        </div>

        {{-- Success Alert --}}
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
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->service->name ?? '-' }}</td>
                            <td>{{ $project->deleted_at?->format('M d, Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.projects.restore', $project->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success">Restore</button>
                                </form>

                                <form action="{{ route('admin.projects.forceDelete', $project->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('⚠️ PERMANENTLY delete this project? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete Forever</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Trash is empty.</td>
                        </tr>
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
    /* Centered container */
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
        background: linear-gradient(135deg, #dc3545, #6c757d); /* red -> gray */
    }
    .custom-table th {
        color: #fff !important;
        border: none;
        text-transform: uppercase;
        font-weight: 600;
    }

    /* Table rows */
    .custom-table td {
        color: #f8f9fa !important;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    /* Hover */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(220, 53, 69, 0.75) !important; /* Bootstrap danger red */
        color: #fff !important;
        transform: scale(1.01);
    }
</style>
@endpush
