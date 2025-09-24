@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
     <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">{{ __('Services') }}</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Add Service</a>
                <a href="{{ route('admin.services.trash') }}" class="btn btn-outline-secondary">
                    🗑️ Trash ({{ $trashCount }})
                </a>
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
                        <th>Name</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Move this service to Trash?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Move to Trash</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">No services found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $services->links('pagination::bootstrap-5') }}
    </div>
        </div>
    </div>
  </div>
@endsection


