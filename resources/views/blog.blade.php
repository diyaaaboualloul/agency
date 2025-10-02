@extends('layouts.frontend')

@section('title', 'Our Blog')

@section('content')
{{-- 🔹 Blogs Section --}}
@php
    $blogs = \App\Models\Blog::latest()->paginate(12);
@endphp

@if($blogs->isNotEmpty())
<div class="section aximo-section-padding2">
  <div class="container">
    <div class="row">
      
      <!-- Blog List -->
      <div class="col-lg-8">
        @foreach($blogs as $blog)
          <div class="single-post-item mb-4 blog-card shadow-sm border-0 rounded-3 overflow-hidden">
            
            {{-- 🔹 Main Image with Placeholder --}}
            <a href="{{ route('blogs.show', $blog->id) }}">
              <img src="{{ $blog->image_path ? asset('storage/'.$blog->image_path) : asset('assets/images/placeholder.png') }}" 
                   alt="{{ $blog->title }}" 
                   class="img-fluid w-100"
                   style="height:180px; object-fit:cover;" 
                   onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
            </a>

            <div class="post-content p-4">
              <div class="post-meta d-flex justify-content-between align-items-center mb-2">
                <span class="post-date text-muted small">
                  📅 {{ $blog->created_at->format('F d, Y') }}
                </span>
              </div>

              <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none">
                <h3 class="entry-title fw-bold mb-2">{{ $blog->title }}</h3>
              </a>

              {{-- 🔹 Use short_description if available, otherwise trim description --}}
              <div class="mb-3 blog-excerpt">
                @if($blog->short_description)
                  <p>{{ $blog->short_description }}</p>
                @else
                  {!! Str::limit(strip_tags($blog->description), 150) !!}
                @endif
              </div>

              <a class="post-read-more fw-bold" href="{{ route('blogs.show', $blog->id) }}">
                Read more →
              </a>
            </div>
          </div>
        @endforeach

        <div class="mt-4">
          {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="right-sidebar p-4 bg-white rounded shadow-sm">
          <div class="widget">
            <h3 class="fw-bold mb-4 border-bottom pb-2 text-primary">Recent Posts</h3>

            @foreach($blogs->take(5) as $recent)
              <div class="post-item d-flex align-items-center mb-3 p-2 rounded">
                {{-- 🔹 Thumbnail with Placeholder --}}
                

                <div class="post-text text-start">
                  <div class="post-date small text-muted mb-1">
                    📅 {{ $recent->created_at->format('M d, Y') }}
                  </div>
                  <a class="post-title fw-semibold text-dark text-decoration-none" href="{{ route('blogs.show', $recent->id) }}">
                    {{ Str::limit($recent->title, 50) }}
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endif
@endsection

@push('styles')
<style>
  /* Blog Excerpt Formatting */
  .blog-excerpt ul { list-style: disc; margin-left: 1.2rem; }
  .blog-excerpt ol { list-style: decimal; margin-left: 1.2rem; }
  .blog-excerpt li { margin-bottom: 0.3rem; }

  /* Sidebar Styling */
  .right-sidebar {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
  }

  .right-sidebar .widget h3 {
    font-size: 1.3rem;
    color: #0066ff;
    border-bottom: 2px solid #eaeaea;
    padding-bottom: 8px;
  }

  .post-item {
    transition: all 0.3s ease;
  }
  .post-item:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .post-title {
    font-size: 0.95rem;
    line-height: 1.3;
  }
</style>
@endpush
