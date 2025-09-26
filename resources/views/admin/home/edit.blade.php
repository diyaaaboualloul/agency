@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body form-overlay">
        <h2 class="h3 mb-4 text-white fw-bold">✏️ Edit Section: {{ ucfirst($homeSection->section_key) }}</h2>

        {{-- Global error alert --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="fw-bold">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.home.update', $homeSection->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label text-white fs-5 fw-bold">Heading</label>
                <input type="text" name="heading" value="{{ old('heading', $homeSection->heading) }}" class="form-control form-control-lg">
                @error('heading') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

      

            <div class="mb-4">
                <label class="form-label text-white fs-5 fw-bold">Description</label>
                <textarea name="description" class="form-control form-control-lg" rows="4">{{ old('description', $homeSection->description) }}</textarea>
                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- About section image --}}
            @if($homeSection->section_key === 'about')
                <div class="mb-4">
                    <label class="form-label text-white fs-5 fw-bold">Image</label><br>
                    @if($homeSection->image)
                        <img src="{{ asset('storage/'.$homeSection->image) }}" class="img-thumbnail mb-3" width="220">
                    @endif
                    <input type="file" name="image" class="form-control form-control-lg">
                    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            @endif

            {{-- Hero section background --}}
            @if($homeSection->section_key === 'hero')
                <div class="mb-4">
                    <label class="form-label text-white fs-5 fw-bold">Background Image</label><br>
                    @if($homeSection->bg_image)
                        <img src="{{ asset('storage/'.$homeSection->bg_image) }}" class="img-thumbnail mb-3" width="220">
                    @endif
                    <input type="file" name="bg_image" class="form-control form-control-lg">
                    @error('bg_image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            @endif

            <div class="mb-4">
                <label class="form-label text-white fs-5 fw-bold">Button Text</label>
                <input type="text" name="button_text" value="{{ old('button_text', $homeSection->button_text) }}" class="form-control form-control-lg">
                @error('button_text') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label text-white fs-5 fw-bold">Button URL</label>
                <input type="text" name="button_url" value="{{ old('button_url', $homeSection->button_url) }}" class="form-control form-control-lg">
                @error('button_url') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="form-check mb-4">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $homeSection->is_active ? 'checked' : '' }}>
                <label class="form-check-label text-white fw-bold fs-6">Active</label>
                @error('is_active') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-lg btn-success fw-bold">💾 Save Changes</button>
            <a href="{{ route('admin.home.index') }}" class="btn btn-lg btn-secondary fw-bold">⬅ Back</a>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 900px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .form-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
    }

    /* Labels */
    .form-label {
        font-size: 1.1rem;
    }

    /* Inputs bigger & stylish */
    .form-control-lg {
        font-size: 1.05rem;
        padding: 12px 14px;
        background: rgba(255,255,255,0.1);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.2);
    }
    .form-control-lg:focus {
        background: rgba(255,255,255,0.15);
        color: #fff;
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13,110,253,0.6);
    }

    /* Buttons */
    .btn-lg {
        padding: 10px 20px;
        font-size: 1.05rem;
        border-radius: 8px;
    }
    .btn-success {
        background: linear-gradient(135deg, #198754, #20c997);
        border: none;
    }
    .btn-secondary {
        background: rgba(255,255,255,0.2);
        color: #fff;
        border: none;
    }
    .btn-secondary:hover {
        background: rgba(255,255,255,0.35);
    }
</style>
@endpush
