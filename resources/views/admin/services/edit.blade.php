@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
     <x-slot name="header">
        <h2 class="h4">✏️ Edit Service</h2>
    </div>
     <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" name="name" 
                               value="{{ old('name', $service->name) }}" 
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="4">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" name="image" 
                               class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- Show current image if exists --}}
                        @if($service->image)
                            <div class="mt-3">
                                <p class="fw-bold">Current Image:</p>
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="Service Image" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-success">
                        ✅ Update Service
                    </button>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
