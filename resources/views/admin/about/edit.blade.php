<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">✏️ Edit Home Section: {{ $aboutSection->section_key }}</h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.home.update', $aboutSection->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" value="{{ old('heading', $aboutSection->heading) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $aboutSection->subtitle) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $aboutSection->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $aboutSection->button_text) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Button URL</label>
                        <input type="text" name="button_url" value="{{ old('button_url', $aboutSection->button_url) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label><br>
                        @if($aboutSection->image)
                            <img src="{{ asset('storage/'.$aboutSection->image) }}" alt="image" class="img-thumbnail mb-2" width="200">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Background Image</label><br>
                        @if($aboutSection->bg_image)
                            <img src="{{ asset('storage/'.$aboutSection->bg_image) }}" alt="bg" class="img-thumbnail mb-2" width="200">
                        @endif
                        <input type="file" name="bg_image" class="form-control">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $aboutSection->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>

                    <button type="submit" class="btn btn-success">💾 Save Changes</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">⬅ Back</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
