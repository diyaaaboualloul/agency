@extends('layouts.frontend')

@section('title', 'Our Blog')

@section('content')
  {{-- Breadcrumb with background image --}}
  <div class="aximo-breadcrumb" 
       style="margin-top: 70px; background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">
    <div class="container text-center">
      <h1 class="post__title fw-bold" style="color: #fff;">Blogs</h1>
      <nav class="breadcrumbs">
        <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
          <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
          <li aria-current="page" class="text-light">/ Blogs</li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->

<div class="section aximo-section-padding2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        @forelse($blogs as $blog)
          <div class="single-post-item mb-4">
            <div class="post-content">
              <div class="post-meta">
                <div class="post-date">
                  {{ $blog->created_at->format('F d, Y') }}
                </div>
              </div>
              <a href="{{ route('blogs.show', $blog->id) }}">
                <h3 class="entry-title">{{ $blog->title }}</h3>
              </a>
              <p>{{ Str::limit($blog->description, 150) }}</p>
              <a class="post-read-more" href="{{ route('blogs.show', $blog->id) }}">
                read more →
              </a>
            </div>
          </div>
        @empty
          <p>No blog posts yet.</p>
        @endforelse

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
@endsection
