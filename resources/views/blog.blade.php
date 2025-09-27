@extends('layouts.frontend')

@section('title', 'Our Blog')

@section('content')
{{-- Breadcrumb with background image & overlay --}}
<div class="aximo-breadcrumb position-relative" 
     style="background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">

    {{-- Dark overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.6);"></div>

    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="post__title fw-bold text-white">Blogs</h1>
        <nav class="breadcrumbs">
            <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
                <li aria-current="page" class="text-light">/ Blogs</li>
            </ul>
        </nav>
    </div>
</div>
<!-- End breadcrumb -->

{{-- 🔹 Blog Section (only show if blogs exist) --}}
@if($blogs->isNotEmpty())
<div class="section aximo-section-padding2">
  <div class="container">
    <div class="row">
      
      <!-- Blog List -->
      <div class="col-lg-8">
        @foreach($blogs as $blog)
          <div class="single-post-item mb-4 blog-card shadow-sm border-0 rounded-3">
            <div class="post-content p-4">
              <div class="post-meta d-flex justify-content-between align-items-center mb-2">
                <span class="post-date text-muted small">
                  📅 {{ $blog->created_at->format('F d, Y') }}
                </span>
              </div>
              <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none">
                <h3 class="entry-title fw-bold mb-2">{{ $blog->title }}</h3>
              </a>
              <p class="mb-3">{!! Str::limit($blog->description, 150) !!}</p>

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
        <div class="right-sidebar">
          <div class="widget">
            <h3 class="wp-block-heading">Recent Posts:</h3>
            @foreach($blogs->take(5) as $recent)
              <div class="post-item">
                <div class="post-text">
                  <div class="post-date">{{ $recent->created_at->format('M d, Y') }}</div>
                  <a class="post-title" href="{{ route('blogs.show', $recent->id) }}">
                    {{ $recent->title }}
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
