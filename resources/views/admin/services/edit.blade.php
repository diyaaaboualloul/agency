<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Service</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block">Name</label>
                <input type="text" name="name" value="{{ $service->name }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Description</label>
                <textarea name="description" class="w-full border rounded p-2">{{ $service->description }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Update</button>
        </form>
    </div>
</x-app-layout>
