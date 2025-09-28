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
                📅 {{ $blog->created_at->format('F d, Y') }}
              </div>
            </div>
            <h2 class="entry-title mb-3">{{ $blog->title }}</h2>
            
            {{-- 🔹 Show full HTML (so lists, bold, etc. appear properly) --}}
           <div style="font-size: 1.1rem; line-height: 1.7;" class="blog-content">
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
@push('styles')
<style>
  /* Restore bullets/numbers only inside blog content */
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
