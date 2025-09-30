@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="card-body table-overlay">
        {{-- Page Title --}}
        <h2 class="h3 fw-bold text-white mb-3">✏️ Edit Project</h2>

        {{-- Form --}}
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf @method('PUT')

            {{-- Service --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Service</label>
                <select name="service_id" class="form-select" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $project->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
            </div>

            {{-- Summary --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Summary</label>
                <textarea name="summary" class="form-control" rows="2">{{ $project->summary }}</textarea>
            </div>

            {{-- Description (CKEditor) --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Description</label>
                <textarea id="editor" name="description" class="form-control" rows="5">{{ $project->description }}</textarea>
            </div>

            {{-- Extra Info --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Client</label>
                    <input type="text" name="client" class="form-control" value="{{ $project->client }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $project->location }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label text-white fw-semibold fs-5">Completed At</label>
                    <input type="date" name="completed_at" class="form-control" 
                           value="{{ $project->completed_at ? $project->completed_at->format('Y-m-d') : '' }}">
                </div>
            </div>
<div class="mb-3">
    <label class="form-label text-white">Project Link</label>
    <input type="url" name="link" class="form-control" value="{{ $project->link }}">
</div>

            {{-- Cover Image --}}
            <div class="mb-3">
                <label class="form-label text-white fw-semibold fs-5">Cover Image</label>
                <input type="file" name="cover_image" class="form-control">
                @if($project->cover_image)
                    <img src="{{ $project->cover_url }}" alt="" class="mt-3 rounded shadow" width="150">
                @endif
            </div>

            {{-- Published --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" {{ $project->is_published ? 'checked' : '' }}>
                <label class="form-check-label text-white fw-semibold">Published</label>
            </div>

            {{-- Actions --}}
            <button class="btn btn-success">💾 Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">⬅ Cancel</a>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center page */
    .content-centered {
        max-width: 900px;
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

    /* Labels and inputs */
    .form-label {
        font-size: 1rem;
    }
    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 0.95rem;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.5);
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

            // Keep textarea synced
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
