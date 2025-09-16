<x-app-layout>
    <x-slot name="header">
        <h2 class="h4">✏️ Edit Contact Info</h2>
    </x-slot>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Add Project</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Service</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>
                            <img src="{{ $project->cover_url }}" 
                                 alt="" width="60" height="40" 
                                 class="rounded" style="object-fit: cover;">
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->service->name }}</td>
                        <td>
                            @if($project->is_published)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" 
                               class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" 
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $projects->links('pagination::bootstrap-5') }}
</div>
</x-app-layout>
