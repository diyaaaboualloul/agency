@extends('layouts.admin')

@section('title','Add Blog')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <div class="container py-4">
            <h2>Add Blog</h2>

            <form action="{{ route('admin.blogs.store') }}" method="POST" class="mt-3">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description (HTML allowed) -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="6" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small class="text-muted">You can use HTML tags here (e.g., &lt;b&gt;bold&lt;/b&gt;)</small>
                </div>

                <!-- Buttons -->
                <button class="btn btn-success">Save</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
