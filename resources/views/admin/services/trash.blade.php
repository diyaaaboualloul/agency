@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h3 fw-bold text-white mb-0">🗑️ Services — Trash</h2>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-info fw-semibold">
                ← Back to Services
            </a>
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
                        <th>Name</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td class="fw-bold">{{ $service->name }}</td>
                            <td>{{ $service->deleted_at?->format('M d, Y H:i') }}</td>
                            <td class="text-end">
                                {{-- Restore --}}
                                <form action="{{ route('admin.services.restore', $service->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success">♻️ Restore</button>
                                </form>

                                {{-- Force Delete --}}
                                <form action="{{ route('admin.services.forceDelete', $service->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('⚠️ PERMANENTLY delete this service? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">🗑️ Delete Forever</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Trash is empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $services->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center content */
    .content-centered {
        max-width: 1000px;
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
        background: linear-gradient(135deg, #6c757d, #343a40);
    }
    .custom-table th {
        color: #fff !important;
        border: none;
        text-transform: uppercase;
        font-size: 0.9rem;
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
        background: rgba(220, 53, 69, 0.7) !important; /* red-ish hover */
        color: #fff !important;
        transform: scale(1.01);
    }

    /* Buttons */
    .btn {
        font-size: 0.85rem;
        padding: 6px 12px;
    }
</style>
@endpush
