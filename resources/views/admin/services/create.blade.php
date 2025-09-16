<x-app-layout>
    <x-slot name="header">
        <h2 class="h4">➕ Add Service</h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter service name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter service description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        💾 Save Service
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
