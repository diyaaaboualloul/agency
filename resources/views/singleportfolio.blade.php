@extends('layouts.frontend')

@section('title', $project->title)

@section('content')

<div class="container py-5" style="margin-top: 90px;">
    <div class="row">
        <!-- Image -->
        <div class="col-lg-7 mb-4">
            <img src="{{ $project->cover_url }}" 
                 alt="{{ $project->title }}" 
                 class="img-fluid rounded shadow">
        </div>

        <!-- Info -->
        <div class="col-lg-5">
            <h1 class="fw-bold">{{ $project->title }}</h1>
            <p class="text-muted">{{ $project->summary }}</p>

            <ul class="list-unstyled">
                @if($project->client)
                    <li><strong>Client:</strong> {{ $project->client }}</li>
                @endif
                @if($project->location)
                    <li><strong>Location:</strong> {{ $project->location }}</li>
                @endif
                @if($project->completed_at)
                    <li><strong>Completed:</strong> {{ $project->completed_at->format('F Y') }}</li>
                @endif
                <li><strong>Service:</strong> {{ $project->service->name }}</li>
            </ul>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="fw-bold">Project Details</h3>
        <p style="line-height: 1.7; font-size: 1.1rem;">
            {!! nl2br(e($project->description)) !!}
        </p>
    </div>

    <!-- 🔹 Navigation Arrows -->
    <div class="d-flex justify-content-between mt-5">
        @if($previous)
            <a href="{{ route('singleportfolio', $previous->slug) }}" 
               class="btn btn-outline-secondary">
                ← {{ $previous->title }}
            </a>
        @else
            <span></span>
        @endif

        @if($next)
            <a href="{{ route('singleportfolio', $next->slug) }}" 
               class="btn btn-outline-secondary">
                {{ $next->title }} →
            </a>
        @endif
    </div>

    <!-- 🔹 Back to Portfolio (centered) -->
    <div class="text-center mt-4">
        <a href="{{ route('portfolio') }}" class="btn btn-outline-primary">
            ← Back to Portfolio
        </a>
    </div>
</div>
@endsection
