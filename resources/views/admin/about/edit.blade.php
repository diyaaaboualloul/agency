@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        <h2 class="h3 mb-3 text-white fw-bold">✏️ Edit About Section: {{ ucfirst($aboutSection->section_key) }}</h2>

        <form method="POST" action="{{ route('admin.about.update', $aboutSection->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Heading --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Heading</label>
                <input type="text" name="heading" value="{{ old('heading', $aboutSection->heading) }}" class="form-control custom-input">
            </div>

            {{-- Subtitle (only if NOT hero) --}}
            @if($aboutSection->section_key !== 'hero')
                <div class="mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $aboutSection->subtitle) }}" class="form-control custom-input">
                </div>
            @endif

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Description</label>
                <textarea name="description" class="form-control custom-input" rows="4">{{ old('description', $aboutSection->description) }}</textarea>
            </div>

            {{-- Image (only if not hero) --}}
            @if($aboutSection->section_key !== 'hero')
                <div class="mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Image</label><br>
                    @if($aboutSection->image)
                        <img src="{{ asset('storage/'.$aboutSection->image) }}" class="img-thumbnail mb-2" width="200">
                    @endif
                    <input type="file" name="image" class="form-control custom-input">
                </div>
            @endif

            {{-- Background Image (only for hero) --}}
            @if($aboutSection->section_key === 'hero')
                <div class="mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Background Image</label><br>
                    @if($aboutSection->bg_image)
                        <img src="{{ asset('storage/'.$aboutSection->bg_image) }}" class="img-thumbnail mb-2" width="200">
                    @endif
                    <input type="file" name="bg_image" class="form-control custom-input">
                </div>
            @endif

            {{-- Buttons (only for hero and team) --}}
            @if(in_array($aboutSection->section_key, ['hero', 'team']))
                <div class="mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $aboutSection->button_text) }}" class="form-control custom-input">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Button URL</label>
                    <input type="text" name="button_url" value="{{ old('button_url', $aboutSection->button_url) }}" class="form-control custom-input">
                </div>
            @endif

            {{-- Active toggle --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $aboutSection->is_active ? 'checked' : '' }}>
                <label class="form-check-label text-white">Active</label>
            </div>

            {{-- Actions --}}
            <button type="submit" class="btn btn-success btn-lg">💾 Save Changes</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary btn-lg">⬅ Back</a>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center container */
    .content-centered {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Glassy background */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Input fields */
    .custom-input {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.3);
    }
    .custom-input:focus {
        background: rgba(255,255,255,0.15);
        border-color: #0d6efd;
        box-shadow: 0 0 6px #0d6efd;
        color: #fff;
    }

    /* File input */
    input[type="file"] {
        color: #fff;
    }

    /* Buttons */
    .btn-lg {
        padding: 10px 18px;
        font-size: 1rem;
        font-weight: 600;
    }
</style>
@endpush
