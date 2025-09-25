@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Header --}}
        <h2 class="h3 fw-bold text-white mb-4">✏️ Edit Service</h2>

        {{-- Form --}}
        <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-4">
                <label class="form-label fw-bold text-white">Service Name</label>
                <input type="text" name="name" 
                       value="{{ old('name', $service->name) }}" 
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="form-label fw-bold text-white">Description</label>
                <textarea name="description" 
                          class="form-control @error('description') is-invalid @enderror" 
                          rows="4">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image Upload --}}
            <div class="mb-4">
                <label class="form-label fw-bold text-white">Upload New Image</label>
                <input type="file" name="image" 
                       class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')
                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                @enderror

                {{-- Show current image if exists --}}
                @if($service->image)
                    <div class="mt-3">
                        <p class="fw-bold text-white">Current Image:</p>
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="Service Image" class="img-thumbnail shadow-lg" style="max-height: 180px;">
                    </div>
                @endif
            </div>

            {{-- Submit --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success fw-semibold">
                    ✅ Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary fw-semibold">
                    ⬅ Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Centered container */
    .content-centered {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Dark glassy card */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Labels */
    .form-label {
        font-size: 1.05rem;
    }

    /* Inputs */
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.3);
    }
    .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    /* Buttons */
    .btn {
        font-size: 1rem;
        padding: 8px 18px;
    }
</style>
@endpush
