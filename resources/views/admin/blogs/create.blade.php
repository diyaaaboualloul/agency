@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
     <div class="container py-4">
    <h2>Add Blog</h2>

    <form action="{{ route('admin.blogs.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="6" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
    </div>
  </div>
@endsection


