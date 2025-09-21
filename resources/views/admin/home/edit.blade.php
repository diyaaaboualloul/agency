<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">✏️ Edit Section: {{ ucfirst($homeSection->section_key) }}</h2>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.home.update', $homeSection->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" value="{{ old('heading', $homeSection->heading) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $homeSection->subtitle) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $homeSection->description) }}</textarea>
                    </div>

                    {{-- Show only for About section --}}
                    @if($homeSection->section_key === 'about')
                        <div class="mb-3">
                            <label class="form-label">Image</label><br>
                            @if($homeSection->image)
                                <img src="{{ asset('storage/'.$homeSection->image) }}" class="img-thumbnail mb-2" width="200">
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
                    @endif

                    {{-- Show only for Hero section --}}
                    @if($homeSection->section_key === 'hero')
                        <div class="mb-3">
                            <label class="form-label">Background Image</label><br>
                            @if($homeSection->bg_image)
                                <img src="{{ asset('storage/'.$homeSection->bg_image) }}" class="img-thumbnail mb-2" width="200">
                            @endif
                            <input type="file" name="bg_image" class="form-control">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $homeSection->button_text) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Button URL</label>
                        <input type="text" name="button_url" value="{{ old('button_url', $homeSection->button_url) }}" class="form-control">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $homeSection->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>

                    <button type="submit" class="btn btn-success">💾 Save Changes</button>
                    <a href="{{ route('admin.home.index') }}" class="btn btn-secondary">⬅ Back</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
