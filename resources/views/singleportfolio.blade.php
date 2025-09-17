@extends('layouts.frontend')

@section('title', $project->title)

@section('content')

<div class="container py-5" style="margin-top: 90px;">

    <div class="row g-5 align-items-start">
        <!-- Image -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <img src="{{ $project->cover_url }}" 
                     alt="{{ $project->title }}" 
                     class="img-fluid w-100" 
                     style="max-height: 450px; object-fit: cover;">
            </div>
        </div>

        <!-- Info -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <h1 class="fw-bold mb-3 text-primary">{{ $project->title }}</h1>
                <p class="text-muted mb-4">{{ $project->summary }}</p>

                <ul class="list-group list-group-flush mb-3">
                    @if($project->client)
                        <li class="list-group-item">
                            <strong class="text-secondary">Client:</strong> {{ $project->client }}
                        </li>
                    @endif
                    @if($project->location)
                        <li class="list-group-item">
                            <strong class="text-secondary">Location:</strong> {{ $project->location }}
                        </li>
                    @endif
                    @if($project->completed_at)
                        <li class="list-group-item">
                            <strong class="text-secondary">Completed:</strong> {{ $project->completed_at->format('F Y') }}
                        </li>
                    @endif
                    <li class="list-group-item">
                        <strong class="text-secondary">Service:</strong> {{ $project->service->name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Project Details -->
    <div class="card border-0 shadow-sm rounded-3 mt-5 p-4">
        <h3 class="fw-bold text-primary mb-3">Project Details</h3>
        <p class="mb-0" style="line-height: 1.7; font-size: 1.05rem;">
            {!! nl2br(e($project->description)) !!}
        </p>
    </div>

    <!-- Navigation -->
    <div class="d-flex justify-content-between mt-5">
        @if($previous)
            <a href="{{ route('singleportfolio', $previous->slug) }}" 
               class="btn btn-outline-success rounded-pill px-4 py-2">
                ← {{ $previous->title }}
            </a>
        @else
            <span></span>
        @endif

        @if($next)
            <a href="{{ route('singleportfolio', $next->slug) }}" 
               class="btn btn-outline-success rounded-pill px-4 py-2">
                {{ $next->title }} →
            </a>
        @endif
    </div>

    <!-- Back to Portfolio -->
    <div class="text-center mt-4">
        <a href="{{ route('portfolio') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
            ← Back to Portfolio
        </a>
    </div>
</div>

@endsection
