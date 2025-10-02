@extends('layouts.frontend')

@section('title', $blog->title)

@section('content')

{{-- Hero Section --}}
<section class="blog-hero position-relative text-center text-white py-5 mb-5"
         style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), 
                url('{{ $blog->image_path ? asset('storage/'.$blog->image_path) : asset('assets/images/placeholder.png') }}') 
                center/cover no-repeat;">
  <div class="container position-relative" style="z-index: 2;">
    <h1 class="fw-bold display-5 mb-3">{{ $blog->title }}</h1>
    <p class="text-light mb-0">
      📅 {{ $blog->created_at->format('F d, Y') }}
    </p>
    @if($blog->short_description)
      <p class="lead fst-italic mt-2">{{ $blog->short_description }}</p>
    @endif
  </div>
</section>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-9">

      {{-- Featured Image --}}
      <div class="mb-4 text-center">
        <img src="{{ $blog->image_path ? asset('storage/'.$blog->image_path) : asset('assets/images/placeholder.png') }}" 
             alt="{{ $blog->title }}" 
             class="img-fluid rounded shadow blog-feature-img"
             onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
      </div>

      {{-- Blog Content --}}
      <article class="blog-article p-4 bg-white rounded shadow-sm mb-5">
        <div class="blog-body">
          {!! $blog->description !!}
        </div>
      </article>

{{-- Gallery Section --}}
@if($blog->images->count())
  <section class="blog-gallery mb-5">
    <h3 class="fw-bold mb-3">Gallery</h3>
    <div class="row g-3">
      @foreach($blog->images as $img)
        <div class="col-md-4 col-sm-6">
          <a data-fancybox="blog-gallery" 
             data-caption="{{ $blog->title }}" 
             href="{{ asset('storage/'.$img->path) }}">
            <img src="{{ $img->path ? asset('storage/'.$img->path) : asset('assets/images/placeholder.png') }}" 
                 alt="Gallery Image"
                 class="rounded shadow-sm w-100"
                 style="height:220px; object-fit:cover; border-radius:8px;"
                 onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
          </a>
        </div>
      @endforeach
    </div>
  </section>
@endif




      {{-- Back Button --}}
      <div class="text-center">
        <a href="{{ route('blogs.index') }}" style="margin-bottom:50px;" class="btn btn-lg btn-primary shadow px-4">
          ← Back to Blogs
        </a>
      </div>

    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
  /* Hero */
  .blog-hero {
    position: relative;
    background-attachment: fixed;
  }

  /* Featured Image */
  .blog-feature-img {
    transition: transform .4s ease, box-shadow .4s ease;
    border-radius: 16px;
    max-height: 400px;
    object-fit: cover;
  }
  .blog-feature-img:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
  }

  /* Blog Article */
  .blog-article {
    font-size: 1.1rem;
    line-height: 1.8;
  }
  .blog-article h2, 
  .blog-article h3 {
    margin-top: 1.5rem;
    margin-bottom: .75rem;
    font-weight: bold;
  }
  .blog-article p {
    margin-bottom: 1rem;
  }

  /* Lists */
  .blog-body ul {
    list-style: disc;
    margin-left: 1.5rem;
    margin-bottom: 1rem;
  }
  .blog-body ol {
    list-style: decimal;
    margin-left: 1.5rem;
    margin-bottom: 1rem;
  }
  .blog-body li {
    margin-bottom: 0.5rem;
  }

  /* Gallery */
  .gallery-img {
    width: 100%;
    height: 220px !important; /* unified height */
    object-fit: cover; /* crop & center */
    border-radius: 8px;
    transition: transform .3s ease, box-shadow .3s ease;
    cursor: pointer;
    display: block; /* removes inline spacing */
}
.gallery-img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}


  /* Back Button */
  .btn-primary {
    background: linear-gradient(135deg, #0066ff, #00c6ff);
    border: none;
    border-radius: 30px;
    transition: transform .2s ease;
  }
  .btn-primary:hover {
    transform: translateY(-3px);
  }
</style>
@endpush
