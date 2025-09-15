<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Add Service</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block">Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Description</label>
                <textarea name="description" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block">Image</label>
                <input type="file" name="image" class="w-full border rounded p-2" accept="image/*">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
