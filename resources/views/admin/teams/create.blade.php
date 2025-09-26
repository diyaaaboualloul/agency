@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">➕ Add Team</h2>

        {{-- 🔴 Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ✍️ Add Form --}}
        <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Name</label>
                <input type="text" name="name" class="form-control text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Instagram Link</label>
                <input type="url" name="insta_link" class="form-control text-white" placeholder="https://instagram.com/...">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Facebook Link</label>
                <input type="url" name="facebook_link" class="form-control text-white" placeholder="https://facebook.com/...">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Job Title</label>
                <input type="text" name="title_job" class="form-control text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Image</label>
                <input type="file" name="image" class="form-control text-white" accept="image/*">
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-success shadow">💾 Save</button>
                <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary shadow">⬅ Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 700px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
    }

    /* White labels */
    .form-label {
        color: #fff !important;
    }

    /* White inputs */
    .form-control {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff !important;
    }

    /* White placeholders */
    .form-control::placeholder {
        color: rgba(255,255,255,0.6);
    }

    /* Focus effect */
    .form-control:focus {
        background: rgba(255,255,255,0.15);
        border-color: #0d6efd;
        color: #fff;
        box-shadow: 0 0 8px rgba(13,110,253,0.6);
    }
</style>
@endpush
