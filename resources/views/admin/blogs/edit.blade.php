@extends('layouts.admin')

@section('title','Edit Blog')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">✏️ Edit Blog</h2>

        {{-- 🔴 Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="fw-bold">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Edit Form --}}
        <form id="blogForm" action="{{ route('admin.blogs.update', $blog->id) }}" 
              method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf 
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Title</label>
                <input type="text" name="title" class="form-control" 
                       value="{{ old('title', $blog->title) }}" required>
            </div>

            {{-- Short Description --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Short Description</label>
                <textarea name="short_description" rows="3" class="form-control">{{ old('short_description', $blog->short_description) }}</textarea>
            </div>

            {{-- Main Image --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Main Image</label>
                @if($blog->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$blog->image_path) }}" 
                             alt="Current Image" style="max-width:200px;border-radius:8px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
                <small class="text-light">Upload to replace current image</small>
            </div>

          {{-- Gallery Images --}}
<div class="mb-3">
    <label class="form-label fw-semibold text-white">Gallery Images</label>

    <div class="d-flex flex-wrap gap-3 mb-3">
        @foreach($blog->images as $img)
            <div class="position-relative" style="width:120px;">
                <img src="{{ asset('storage/'.$img->path) }}"
                     alt="Gallery Image"
                     style="width:120px; height:100px; object-fit:cover; border-radius:6px;">

                {{-- Delete button targets a hidden form below (no nesting) --}}
                <button type="submit"
                        form="delete-img-{{ $img->id }}"
                        class="btn btn-sm btn-danger p-1"
                        style="position:absolute; top:5px; right:5px; font-size:12px; border-radius:50%;"
                        onclick="return confirm('Are you sure you want to delete this image?')">
                    ✕
                </button>
            </div>
        @endforeach
    </div>

    {{-- Upload new images --}}
    <input type="file" name="gallery[]" class="dropify" multiple
           data-allowed-file-extensions="jpg jpeg png webp"/>
    <small class="text-light">Upload new images (existing ones stay unless deleted)</small>
</div>


            {{-- Description (CKEditor) --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Description</label>
                <textarea id="editor" name="description" rows="6" class="form-control" required>
                    {{ old('description', $blog->description) }}
                </textarea>
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-2">
                <button class="btn btn-success shadow">💾 Update</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light shadow">⬅ Cancel</a>
            </div>
        </form>
    </div>
    {{-- Hidden delete forms (MUST be outside the update form) --}}
@foreach($blog->images as $img)
    <form id="delete-img-{{ $img->id }}"
          action="{{ route('admin.blogs.gallery.delete', $img->id) }}"
          method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

</div>
@endsection


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css"/>
<style>
    .content-centered{max-width:800px;margin:40px auto;padding:0 20px}
    .table-overlay{background:rgba(0,0,0,.65);border-radius:12px;padding:30px;box-shadow:0 8px 25px rgba(0,0,0,.6);backdrop-filter:blur(6px)}
    .form-label{font-size:1rem;font-weight:600}
    .form-control{background:rgba(255,255,255,.9);border-radius:8px;transition:all .3s}
    .form-control:focus{border-color:#0d6efd;box-shadow:0 0 8px rgba(13,110,253,.6)}
    .btn{border-radius:6px;font-weight:600}
</style>
@endpush

