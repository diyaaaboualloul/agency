@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">➕ Add Blog</h2>

        {{-- ✅ Form --}}
        <form action="{{ route('admin.blogs.store') }}" method="POST" class="mt-3">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter blog title" required>
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Description</label>
                <textarea name="description" rows="6" class="form-control" placeholder="Enter blog content" required></textarea>
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-2">
                <button class="btn btn-success shadow">💾 Save</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light shadow">⬅ Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 800px;
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

    /* Form labels */
    .form-label {
        font-size: 1rem;
        font-weight: 600;
    }

    /* Inputs */
    .form-control {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13, 110, 253, 0.6);
    }

    /* Buttons */
    .btn {
        border-radius: 6px;
        font-weight: 600;
    }
</style>
@endpush
