@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">{{ __('Blogs') }}</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ Add Blog</a>
                <a href="{{ route('admin.blogs.trash') }}" class="btn btn-outline-secondary">
                    🗑️ Trash ({{ $trashCount }})
                </a>
            </div>
        </div>
         <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Move this blog to Trash?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Move to Trash</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">No blogs found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
    </div>
  </div>
@endsection


