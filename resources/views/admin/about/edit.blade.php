@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
             <h2 class="h4 mb-0">✏️ Edit About Section: {{ ucfirst($aboutSection->section_key) }}</h2>
<div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.about.update', $aboutSection->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Heading --}}
                    <div class="mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" value="{{ old('heading', $aboutSection->heading) }}" class="form-control">
                    </div>

                    {{-- Subtitle (only if NOT hero) --}}
                    @if($aboutSection->section_key !== 'hero')
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle', $aboutSection->subtitle) }}" class="form-control">
                        </div>
                    @endif

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $aboutSection->description) }}</textarea>
                    </div>

                    {{-- Image (only if not hero) --}}
                    @if($aboutSection->section_key !== 'hero')
                        <div class="mb-3">
                            <label class="form-label">Image</label><br>
                            @if($aboutSection->image)
                                <img src="{{ asset('storage/'.$aboutSection->image) }}" class="img-thumbnail mb-2" width="200">
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
                    @endif

                    {{-- Background Image (only for hero) --}}
                    @if($aboutSection->section_key === 'hero')
                        <div class="mb-3">
                            <label class="form-label">Background Image</label><br>
                            @if($aboutSection->bg_image)
                                <img src="{{ asset('storage/'.$aboutSection->bg_image) }}" class="img-thumbnail mb-2" width="200">
                            @endif
                            <input type="file" name="bg_image" class="form-control">
                        </div>
                    @endif

                    {{-- Buttons (only for hero and team) --}}
                    @if(in_array($aboutSection->section_key, ['hero', 'team']))
                        <div class="mb-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="button_text" value="{{ old('button_text', $aboutSection->button_text) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="button_url" value="{{ old('button_url', $aboutSection->button_url) }}" class="form-control">
                        </div>
                    @endif

                    {{-- Active toggle --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $aboutSection->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>

                    {{-- Actions --}}
                    <button type="submit" class="btn btn-success">💾 Save Changes</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">⬅ Back</a>
                </form>
            </div>
        </div>
    </div>
    </div>
  </div>
@endsection


