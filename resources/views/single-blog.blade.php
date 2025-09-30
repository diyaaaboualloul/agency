@extends('layouts.frontend')

@section('title', $blog->title)

@section('content')
<div class="section aximo-section-padding2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <article class="single-post-item">
          
          {{-- Main Image --}}
          @if($blog->image_path)
            <div class="mb-4">
              <img src="{{ asset('storage/'.$blog->image_path) }}" 
                   alt="{{ $blog->title }}" 
                   class="img-fluid rounded shadow">
            </div>
          @endif

          <div class="post-content">
            <div class="post-meta mb-2">
              <div class="post-date">
                📅 {{ $blog->created_at->format('F d, Y') }}
              </div>
            </div>

            {{-- Title --}}
            <h2 class="entry-title mb-3">{{ $blog->title }}</h2>

            {{-- Short Description --}}
            @if($blog->short_description)
              <p class="lead text-muted">{{ $blog->short_description }}</p>
            @endif

            {{-- Full Description --}}
            <div style="font-size: 1.1rem; line-height: 1.7;" class="blog-content">
              {!! $blog->description !!}
            </div>
          </div>
        </article>

        {{-- Gallery --}}
        @if($blog->images->count())
          <div class="mt-5">
            <h4 class="mb-3">📸 Gallery</h4>
            <div class="row g-3">
              @foreach($blog->images as $img)
                <div class="col-md-4 col-sm-6">
                  <img src="{{ asset('storage/'.$img->path) }}" 
                       alt="Gallery Image" 
                       class="img-fluid rounded shadow-sm">
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <div class="mt-4">
          <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">← Back to Blog</a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .blog-content ul {
    list-style: disc;
    margin-left: 1.5rem;
    margin-bottom: 1rem;
  }
  .blog-content ol {
    list-style: decimal;
    margin-left: 1.5rem;
    margin-bottom: 1rem;
  }
  .blog-content li {
    margin-bottom: 0.5rem;
  }
</style>
@endpush
