@extends('layouts.frontend')

@section('title', 'Home')

@section('content')

{{-- 🔹 Hero Section --}}
@if($hero && $hero->is_active)
<section class="hero d-flex align-items-center text-white position-relative" 
    style="background-image: url('{{ $hero->bg_image ? asset('storage/'.$hero->bg_image) : asset('assets/images/placeholder.png') }}'); 
           background-size:cover; 
           background-position:center; 
           min-height:95vh;">

    {{-- Overlay --}}
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.55);"></div>

    <div class="container text-center position-relative">
        <h1 class="display-4 fw-bold">{{ $hero->heading }}</h1>
        <p class="lead">{{ $hero->description }}</p>

        @if($hero->button_text && $hero->button_url)
            <a href="{{ $hero->button_url }}" class="btn btn-lg btn-primary mt-3">
                {{ $hero->button_text }}
            </a>
        @endif
    </div>
</section>
@endif


{{-- 🔹 About Us Section --}}
@if($about && $about->is_active)
<section class="about py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ $about->image ? asset('storage/'.$about->image) : asset('assets/images/placeholder.png') }}" 
                     alt="About Us" 
                     class="img-fluid rounded shadow"
                     onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $about->heading }}</h2>
                <p class="text-muted">{{ $about->description }}</p>
                @if($about->button_text && $about->button_url)
                    <a href="{{ $about->button_url }}" class="btn btn-outline-primary">{{ $about->button_text }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endif


{{-- 🔹 Services Section --}}
@php
    $services = \App\Models\Service::latest()->take(4)->get();
@endphp
@if($services->isNotEmpty())
<section class="services py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Our Services</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                       <div class="img-fixed-wrapper">
    <img src="{{ asset('storage/'.$service->image) }}" 
         alt="{{ $service->name }}" 
         class="img-fixed"
         onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
</div>

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($service->description, 80) }}</p>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('services') }}" class="btn btn-primary mt-3">View All Services</a>
    </div>
</section>
@endif





{{-- 🔹 Projects Section --}}
@php
    $projects = \App\Models\Project::latest()->take(4)->get();
@endphp
@if($projects->isNotEmpty())
<section class="projects py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Our Projects</h2>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        
                        {{-- 🔹 Image with fixed height & placeholder --}}
                        <div class="img-fixed-wrapper">
                            <img src="{{ $project->cover_image ? asset('storage/'.$project->cover_image) : asset('assets/images/placeholder.png') }}" 
                                 alt="{{ $project->title }}"
                                 class="img-fixed"
                                 onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($project->summary, 80) }}</p>
                            <a href="{{ route('singleportfolio', $project->slug) }}" class="btn btn-sm btn-outline-dark">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('portfolio') }}" class="btn btn-primary mt-3">View All Projects</a>
    </div>
</section>
@endif


{{-- 🔹 Blogs Section --}}
@php
    $blogs = \App\Models\Blog::latest()->take(3)->get();
@endphp

@if($blogs->isNotEmpty())
<section class="blogs py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Latest Blogs</h2>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                           <div class="img-fixed-wrapper">

                        {{-- Blog Image with Placeholder --}}
                        <img src="{{ $blog->image_path ? asset('storage/'.$blog->image_path) : asset('assets/images/placeholder.png') }}" 
                             alt="{{ $blog->title }}"
                             class="card-img-top rounded-top img-fixed"
                                      class="img-fixed"

                             style="height:200px; object-fit:cover;"
                             onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
                           </div>

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $blog->title }}</h5>

                            {{-- Short Description --}}
                            @if($blog->short_description)
                                <p class="text-muted">{{ Str::limit($blog->short_description, 100) }}</p>
                            @endif

                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">
                                Read More
                            </a>
                        </div>

                        <div class="card-footer text-muted small">
                            {{ $blog->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-3">View All Blogs</a>
    </div>
</section>
@endif



@endsection
@push('styles')
<style>
    .service-img-wrapper {
        height: 200px !important; /* fixed height */
        overflow: hidden !important;
    }
    .service-img {
        height: 100% !important;
        width: 100% !important;
        object-fit: cover !important; /* ensures image fills space without distortion */
    }
</style>
@endpush