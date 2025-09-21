<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">🏠 Manage Homepage Sections</h2>
         <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-info">
                👀 View Home Page
            </a>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Section</th>
                            <th>Heading</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td class="fw-bold text-capitalize">{{ $section->section_key }}</td>
                                <td>{{ $section->heading ?? '-' }}</td>
                                <td>
                                    @if($section->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.home.edit', $section->id) }}" class="btn btn-sm btn-primary">
                                        ✏️ Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
