@extends('layouts.frontend')

@section('title', $blog->title)

@section('content')

<div class="section aximo-section-padding2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <article class="single-post-item">
          <div class="post-content">
            <div class="post-meta mb-2">
              <div class="post-date">
                {{ $blog->created_at->format('F d, Y') }}
              </div>
            </div>
            <h2 class="entry-title mb-3">{{ $blog->title }}</h2>
            
            <!-- عرض HTML مباشرة -->
            <div style="font-size: 1.1rem; line-height: 1.7;">
              {!! $blog->description !!}
            </div>
            
          </div>
        </article>

        <div class="mt-4">
          <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">← Back to Blog</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
