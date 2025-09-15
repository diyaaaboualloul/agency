<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Service</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-4">
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" 
                       class="w-full border rounded p-2" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload --}}
            <div class="mb-4">
                <label class="block font-semibold">Service Image</label>
                <input type="file" name="image" class="w-full border rounded p-2">
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                {{-- Show current image if exists --}}
                @if($service->image)
                    <div class="mt-3">
                        <p class="font-semibold">Current Image:</p>
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="Service Image" class="h-32 rounded shadow-md">
                    </div>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
