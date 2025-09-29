@extends('layouts.frontend')

@section('title', $service->name)

@section('content')

<div class="container py-5" style="margin-top: 0px;">

    <!-- Service Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">{{ $service->name }}</h1>
        <p class="text-muted fs-5">{{ $service->description }}</p>
    </div>

    <!-- Image + Content -->
    <div class="row g-4 align-items-center">
        <!-- Image -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="{{ $service->name }}" 
                         class="img-fluid w-100" 
                         style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/images/placeholder-service.png') }}" 
                         alt="Service placeholder" 
                         class="img-fluid w-100" 
                         style="max-height: 400px; object-fit: cover;">
                @endif
            </div>
        </div>

        <!-- Quick Info -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 h-100">
                <h4 class="fw-bold text-secondary mb-3">About this Service</h4>
                <p class="fs-6 text-muted" style="line-height: 1.7;">
                    {{ $service->description }}
                </p>
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
                                <img src="{{ $project->cover_url ?? asset('assets/images/placeholder.png') }}" 
                                     class="card-img-top" 
                                     alt="{{ $project->title }}" 
                                     style="height: 220px; object-fit: cover;"
                                     onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
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
                <a href="{{ route('portfolio') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                    📂 View All Projects
                </a>
            </div>

            <!-- 🔹 Navigation Arrows -->
            <div class="d-flex justify-content-between mt-5">
                @if($previous)
                    <a href="{{ route('services.show', $previous->id) }}" 
                       class="btn btn-outline-primary rounded-pill px-4 py-2">
                        ← {{ $previous->name }}
                    </a>
                @else
                    <span></span>
                @endif

                @if($next)
                    <a href="{{ route('services.show', $next->id) }}" 
                       class="btn btn-outline-primary rounded-pill px-4 py-2">
                        {{ $next->name }} →
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>

@endsection
