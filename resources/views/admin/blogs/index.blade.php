@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold text-white mb-0">📰 Blogs</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary shadow">+ Add Blog</a>
                <a href="{{ route('admin.blogs.trash') }}" class="btn btn-outline-light shadow">
                    🗑️ Trash ({{ $trashCount }})
                </a>
            </div>
        </div>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- 📋 Blogs Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td class="fw-semibold">{{ $blog->title }}</td>
                            <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning shadow">✏️ Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Move this blog to Trash?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow">🗑️ Move to Trash</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No blogs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 📌 Pagination --}}
        <div class="mt-3">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
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
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    /* Table rows */
    .custom-table td {
        color: #f8f9fa !important;
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

    /* Buttons */
    .btn {
        border-radius: 6px;
    }
</style>
@endpush
