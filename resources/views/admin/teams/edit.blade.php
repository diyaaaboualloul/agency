@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">✏️ Edit Team</h2>

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

        {{-- ✍️ Edit Form --}}
        <form method="POST" action="{{ route('admin.teams.update', $team->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Name</label>
                <input type="text" name="name" class="form-control text-white" 
                       value="{{ old('name', $team->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Instagram Link</label>
                <input type="url" name="insta_link" class="form-control text-white" 
                       value="{{ old('insta_link', $team->insta_link) }}" placeholder="https://instagram.com/...">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Facebook Link</label>
                <input type="url" name="facebook_link" class="form-control text-white" 
                       value="{{ old('facebook_link', $team->facebook_link) }}" placeholder="https://facebook.com/...">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Job Title</label>
                <input type="text" name="title_job" class="form-control text-white" 
                       value="{{ old('title_job', $team->title_job) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Image</label>
                <input type="file" name="image" class="form-control text-white" accept="image/*">

                @if($team->image)
                    <div class="mt-3">
                        <p class="fw-semibold text-white">Current Image:</p>
                        <img src="{{ asset('storage/'.$team->image) }}" 
                             class="rounded shadow-sm border" width="120" height="120" style="object-fit:cover;" 
                             alt="Team Image">
                    </div>
                @endif
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-success shadow">✅ Update</button>
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

    /* Make labels white */
    .form-label {
        color: #fff !important;
    }

    /* Input styling with white text */
    .form-control {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff !important;
    }

    .form-control:focus {
        background: rgba(255,255,255,0.15);
        border-color: #0d6efd;
        color: #fff;
        box-shadow: 0 0 8px rgba(13,110,253,0.6);
    }
</style>
@endpush
