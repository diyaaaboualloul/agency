@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">{{ __('Projects — Trash') }}</h2>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">← Back to Projects</a>
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
                        <th>Service</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->service->name ?? '-' }}</td>
                            <td>{{ $project->deleted_at?->format('M d, Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.projects.restore', $project->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success">Restore</button>
                                </form>

                                <form action="{{ route('admin.projects.forceDelete', $project->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('PERMANENTLY delete this project? This cannot be undone.')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete Forever</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Trash is empty.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>

    </div>
  </div>
@endsection

