<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">⚙️ Manage Services</h2>
    </x-slot>

    <div class="container py-5">
        {{-- Add Service Button --}}
        <div class="mb-4">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                ➕ Add Service
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Services Table --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th style="width: 40%">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td class="text-center">
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" 
                                             alt="{{ $service->name }}" 
                                             class="img-thumbnail" style="width:70px; height:70px; object-fit:cover;">
                                    @else
                                        <span class="text-muted fst-italic">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $service->name }}</td>
                                <td>
                                    {{ Str::limit($service->description, 100, '...') }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning me-1">
                                        ✏️ Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this service?')" 
                                                class="btn btn-sm btn-danger">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No services found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
