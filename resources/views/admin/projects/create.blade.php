@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body form-overlay">
        {{-- Page Title --}}
        <h2 class="h3 fw-bold text-white mb-3">➕ Add Project</h2>

        {{-- Form --}}
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf

            {{-- Service --}}
            <div class="mb-3">
                <label class="form-label text-white">Service</label>
                <select name="service_id" class="form-select" required>
                    <option value="">-- Select Service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            {{-- Summary --}}
            <div class="mb-3">
                <label class="form-label text-white">Summary</label>
                <textarea name="summary" class="form-control" rows="2"></textarea>
            </div>

            {{-- Description (CKEditor) --}}
            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea id="editor" name="description" class="form-control" rows="5"></textarea>
            </div>

            {{-- Row with client, location, date --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white">Client</label>
                    <input type="text" name="client" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white">Completed At</label>
                    <input type="date" name="completed_at" class="form-control">
                </div>
            </div>

            {{-- Cover image --}}
            <div class="mb-3">
                <label class="form-label text-white">Cover Image</label>
                <input type="file" name="cover_image" class="form-control">
            </div>

            {{-- Published checkbox --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" checked>
                <label class="form-check-label text-white">Published</label>
            </div>

            {{-- Buttons --}}
            <button class="btn btn-success">💾 Save</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">⬅ Cancel</a>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center container */
    .content-centered {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Dark glassy form background */
    .form-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Labels */
    .form-label {
        font-weight: bold;
        font-size: 1rem;
    }

    /* Inputs */
    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.6);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    let ckeditorInstance;

    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            ckeditorInstance = editor;

            // Sync content to textarea so Laravel receives it
            const textarea = document.querySelector('#editor');
            const syncToTextarea = () => {
                textarea.value = editor.getData();
                if (!textarea.value.trim()) {
                    textarea.setCustomValidity('Description is required');
                } else {
                    textarea.setCustomValidity('');
                }
            };
            editor.model.document.on('change:data', syncToTextarea);
            syncToTextarea();
        })
        .catch(error => console.error(error));
</script>
@endpush
