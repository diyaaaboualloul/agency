@extends('layouts.frontend')

@section('title', $service->name)

@section('content')
<div class="section aximo-section-padding">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="{{ $service->name }}" 
                         class="img-fluid rounded shadow">
                @else
                    <img src="{{ asset('assets/images/placeholder-service.png') }}" 
                         alt="Service placeholder" 
                         class="img-fluid rounded shadow">
                @endif
            </div>

            <!-- Content -->
            <div class="col-lg-7">
                <div class="aximo-section-title">
                    <h2>{{ $service->name }}</h2>
                </div>
                <p style="font-size: 1.1rem; line-height: 1.7; color: #444;">
                    {{ $service->description }}
                </p>
            </div>
        </div>

        <!-- 🔹 Navigation Arrows -->
        <div class="d-flex justify-content-between mt-5">
            @if($previous)
                <a href="{{ route('services.show', $previous->id) }}" 
                   class="btn btn-outline-primary">
                    ← {{ $previous->name }}
                </a>
            @else
                <span></span>
            @endif

            @if($next)
                <a href="{{ route('services.show', $next->id) }}" 
                   class="btn btn-outline-primary">
                    {{ $next->name }} →
                </a>
            @endif
        </div>
    </div>
</div>
<!-- 🔹 Projects Carousel -->
@if($service->projects->count())
    <div class="mt-5">
        <h3 class="fw-bold mb-4 text-center">Projects under {{ $service->name }}</h3>

        <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
            
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach($service->projects->chunk(3) as $chunkIndex => $chunk)
                    <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="{{ $chunkIndex }}" 
                        class="{{ $chunkIndex === 0 ? 'active' : '' }}" 
                        aria-current="{{ $chunkIndex === 0 ? 'true' : 'false' }}" 
                        aria-label="Slide {{ $chunkIndex+1 }}"></button>
                @endforeach
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                @foreach($service->projects->chunk(3) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row g-4 justify-content-center">
                            @foreach($chunk as $project)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card h-100 shadow-sm border-0 project-card">
                                        <div class="position-relative overflow-hidden rounded">
                                            <img src="{{ $project->cover_url }}" 
                                                 class="card-img-top" 
                                                 alt="{{ $project->title }}" 
                                                 style="height: 220px; object-fit: cover;">
                                            <!-- Overlay -->
                                            <div class="overlay d-flex flex-column justify-content-center align-items-center">
                                                <h6 class="text-white fw-bold mb-2">{{ $project->title }}</h6>
                                                <a href="{{ route('singleportfolio', $project->slug) }}" class="btn btn-sm btn-light">
                                                    🔗 View Project
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <p class="text-muted small mb-0">{{ Str::limit($project->summary, 80) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- 🔹 Button to Portfolio Page -->
        <div class="text-center mt-4">
            <a href="{{ route('portfolio') }}" class="btn btn-primary btn-lg shadow-sm">
                📂 View All Projects
            </a>
        </div>
    </div>
@endif


@endsection
