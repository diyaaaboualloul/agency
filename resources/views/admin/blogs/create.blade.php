@extends('layouts.admin')

@section('title','Add Blog')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">➕ Add Blog</h2>

        {{-- 🔴 Validation errors (server-side) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="fw-bold">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ Blog Form --}}
        <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST" class="mt-3">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter blog title" value="{{ old('title') }}" required>
            </div>

            {{-- Description (CKEditor) --}}
            <div class="mb-3">
                <label class="form-label fw-semibold text-white">Description</label>
                <textarea id="editor" name="description" rows="6" class="form-control" placeholder="Enter blog content" required>{{ old('description') }}</textarea>
            </div>

            {{-- Actions --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success shadow">💾 Save</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light shadow">⬅ Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered{max-width:800px;margin:40px auto;padding:0 20px}
    .table-overlay{background:rgba(0,0,0,.65);border-radius:12px;padding:30px;box-shadow:0 8px 25px rgba(0,0,0,.6);backdrop-filter:blur(6px)}
    .form-label{font-size:1rem;font-weight:600}
    .form-control{background:rgba(255,255,255,.9);border-radius:8px;transition:all .3s}
    .form-control:focus{border-color:#0d6efd;box-shadow:0 0 8px rgba(13,110,253,.6)}
    .btn{border-radius:6px;font-weight:600}
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    let ckeditorInstance;

    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            ckeditorInstance = editor;

            // 🔁 Keep textarea value in sync on every change
            const textarea = document.querySelector('#editor');
            const syncToTextarea = () => {
                textarea.value = editor.getData();
                // (Optional) client-side validity message for required
                if (!textarea.value.trim()) {
                    textarea.setCustomValidity('Description is required');
                } else {
                    textarea.setCustomValidity('');
                }
            };
            editor.model.document.on('change:data', syncToTextarea);
            // Initial sync (covers prefilled old() data)
            syncToTextarea();
        })
        .catch(error => console.error(error));
</script>
@endpush
