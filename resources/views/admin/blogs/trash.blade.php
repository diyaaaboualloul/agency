@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold text-white mb-0">🗑️ Blogs — Trash</h2>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light shadow">
                ← Back to All Blogs
            </a>
        </div>

        {{-- ✅ Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- 📋 Trash Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td class="fw-semibold">{{ $blog->title }}</td>
                            <td>{{ $blog->deleted_at?->format('M d, Y H:i') }}</td>
                            <td class="text-end">
                                {{-- Restore --}}
                                <form action="{{ route('admin.blogs.restore', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success shadow">Restore</button>
                                </form>

                                {{-- Permanent Delete --}}
                                <form action="{{ route('admin.blogs.forceDelete', $blog->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('⚠️ PERMANENTLY delete this blog? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger shadow">Delete Forever</button>
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

        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Glassy overlay */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Table header */
    .custom-table thead {
        background: linear-gradient(135deg, #6c757d, #343a40);
    }
    .custom-table th {
        color: #fff !important;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    /* Table body */
    .custom-table td {
        color: #f8f9fa !important;
    }

    /* Hover effect */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(220, 53, 69, 0.7) !important;
        color: #fff !important;
        transform: scale(1.01);
    }
</style>
@endpush
