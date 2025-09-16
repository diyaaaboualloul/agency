<x-app-layout>

<div class="container py-4">
    <h2>Edit Blog</h2>

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" class="mt-3">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="6" class="form-control" required>{{ $blog->description }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</x-app-layout>
