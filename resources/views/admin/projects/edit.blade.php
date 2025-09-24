@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
             <h2 class="h4">✏️ Edit Contact Info</h2>
<div class="container py-4">
    <h2>Edit Project</h2>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Service</label>
            <select name="service_id" class="form-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $project->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Summary</label>
            <textarea name="summary" class="form-control" rows="2">{{ $project->summary }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5">{{ $project->description }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Client</label>
                <input type="text" name="client" class="form-control" value="{{ $project->client }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $project->location }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Completed At</label>
                <input type="date" name="completed_at" class="form-control" value="{{ $project->completed_at ? $project->completed_at->format('Y-m-d') : '' }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
            @if($project->cover_image)
                <img src="{{ $project->cover_url }}" alt="" class="mt-2 rounded" width="120">
            @endif
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_published" value="1" class="form-check-input" {{ $project->is_published ? 'checked' : '' }}>
            <label class="form-check-label">Published</label>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
    </div>
  </div>
@endsection


