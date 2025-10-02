@extends('layouts.frontend')

@section('title', $project->title)

@section('content')
    <div class="container py-5">

        <!-- 🔹 Project Title -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary">{{ $project->title }}</h1>
            @if($project->summary)
                <p class="text-muted fs-5">{{ $project->summary }}</p>
            @endif
        </div>

        <!-- 🔹 Image + Quick Info -->
        <div class="row g-4 align-items-start">
            <!-- Image -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <img src="{{ $project->cover_url ?: asset('assets/images/placeholder.png') }}"
                        alt="{{ $project->title }}" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;"
                        onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
                </div>
            </div>

            <!-- Quick Facts -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3 p-4 h-100">
                    <h4 class="fw-bold text-secondary mb-3">Quick Facts</h4>
                    <ul class="list-group list-group-flush">
                        @if($project->client)
                            <li class="list-group-item">
                                <strong>Client:</strong> {{ $project->client }}
                            </li>
                        @endif
                        @if($project->location)
                            <li class="list-group-item">
                                <strong>Location:</strong> {{ $project->location }}
                            </li>
                        @endif
                        @if($project->completed_at)
                            <li class="list-group-item">
                                <strong>Completed:</strong> {{ $project->completed_at->format('F Y') }}
                            </li>
                        @endif
                        <li class="list-group-item">
                            <strong>Service:</strong> {{ $project->service->name }}
                        </li>
                        @if($project->link)
                            <li class="list-group-item">
                                <strong>Link:</strong>
                                <a href="{{ $project->link }}" target="_blank" class="text-decoration-underline text-primary">
                                    Visit Project 🔗
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>

        <!-- Project Details -->
        <div class="card border-0 shadow-sm rounded-3 mt-5 p-4">
            <h3 class="fw-bold text-primary mb-3">Project Details</h3>
            <div class="project-description fs-5" style="line-height: 1.7;">
                {!! $project->description !!}
            </div>
        </div>


<!-- 🔹 Navigation (Previous / Next) -->
<div class="portfolio-nav mt-5">
    <div class="row g-3 align-items-stretch">
        <div class="col-12 col-md-6">
            @if($previous)
                <a href="{{ route('singleportfolio', $previous->slug) }}"
                   class="btn btn-outline-success w-100 rounded-pill px-4 py-3 text-truncate">
                    ← {{ $previous->title }}
                </a>
            @endif
        </div>
        <div class="col-12 col-md-6 text-md-end">
            @if($next)
                <a href="{{ route('singleportfolio', $next->slug) }}"
                   class="btn btn-outline-success w-100 rounded-pill px-4 py-3 text-truncate">
                    {{ $next->title }} →
                </a>
            @endif
        </div>
    </div>
</div>

<style>
/* 🔹 Portfolio Navigation Styles */
.portfolio-nav .btn {
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
}

.portfolio-nav .btn:hover {
    background: #198754; /* Bootstrap green */
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(25, 135, 84, 0.35);
}

@media (max-width: 767px) {
    .portfolio-nav .btn {
        font-size: 14px;
        padding: 12px;
    }
}
</style>

        <!-- 🔹 Back to Portfolio -->
        <div class="text-center mt-4">
            <a href="{{ route('portfolio') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                ← Back to Portfolio
            </a>
        </div>

    </div>
@endsection
@push('styles')
    <style>
        .project-description ul,
        .project-description ol {
            list-style-type: disc !important;
            /* bullets */
            padding-left: 1.5rem !important;
            /* space before bullets */
            margin-left: 1rem !important;
        }

        .project-description ol {
            list-style-type: decimal !important;
            /* numbers for ordered lists */
        }

        .project-description li {
            display: list-item !important;
            /* ensures bullets are shown */
            margin-bottom: 0.5rem;
        }
    </style>
@endpush