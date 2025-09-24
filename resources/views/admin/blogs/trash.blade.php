@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
     <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">{{ __('Blogs — Trash') }}</h2>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-primary">← Back to All Blogs</a>
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
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->deleted_at?->format('M d, Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.blogs.restore', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success">Restore</button>
                                </form>

                                <form action="{{ route('admin.blogs.forceDelete', $blog->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('PERMANENTLY delete this blog? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete Forever</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">Trash is empty.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
    </div>
  </div>
@endsection


