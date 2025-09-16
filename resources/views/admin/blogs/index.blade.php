<x-app-layout>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Blogs</h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ Add Blog</a>
    </div>

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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">No blogs found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $blogs->links('pagination::bootstrap-5') }}
</div>
</x-app-layout>
