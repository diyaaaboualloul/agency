@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h3 text-white fw-bold">⚙️ Services</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.services.create') }}" class="btn btn-success fw-semibold">+ Add Service</a>
                <a href="{{ route('admin.services.trash') }}" class="btn btn-outline-light fw-semibold">
                    🗑️ Trash ({{ $trashCount }})
                </a>
            </div>
        </div>

        {{-- Flash success --}}
        @if(session('success'))
            <div class="alert alert-success custom-alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td class="fw-semibold">{{ $service->name }}</td>
                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.services.edit', $service->id) }}" 
                                   class="btn btn-sm btn-warning fw-bold">✏️ Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Move this service to Trash?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger fw-bold">🗑️ Trash</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No services found.</td>
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
    /* Centered container */
    .content-centered {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Dark glassy container */
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
        color: #fff;
        border: none;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    /* Table cells */
    .custom-table td {
        color: #f8f9fa;
        border-top: 1px solid rgba(255,255,255,0.1);
        font-size: 1rem;
    }

    /* Hover rows */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(13, 110, 253, 0.8) !important;
        color: #fff;
        transform: scale(1.01);
    }

    /* Success alert */
    .custom-alert {
        background: rgba(25, 135, 84, 0.8);
        border: none;
        color: #fff;
        font-weight: 500;
    }
</style>
@endpush
