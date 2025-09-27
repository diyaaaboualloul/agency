@extends('layouts.frontend')

@section('title', 'Our Portfolio')

@section('content')
  {{-- Breadcrumb with background image & overlay --}}
<div class="aximo-breadcrumb position-relative" 
     style="background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">

    {{-- Dark overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.6);"></div>

    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="post__title fw-bold text-white">Portfolio</h1>
        <nav class="breadcrumbs">
            <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
                <li aria-current="page" class="text-light">/ Portfolio</li>
            </ul>
        </nav>
    </div>
</div>
<!-- End breadcrumb -->

{{-- 🔹 Portfolio Section --}}
@if($projects->isNotEmpty())
<div class="row g-4 px-3 py-4">
    @foreach($projects as $project)
        <div class="col-sm-6 col-lg-3"> <!-- smaller cards (4 per row on desktop) -->
            <div class="card portfolio-card border-0 shadow-sm h-100">
                <a href="{{ route('singleportfolio', $project->slug) }}" class="text-decoration-none">
                    <div class="portfolio-img-wrapper">
                        <img src="{{ $project->cover_url }}" 
                             alt="{{ $project->title }}" 
                             class="card-img-top">
                        <div class="portfolio-overlay d-flex flex-column justify-content-center align-items-center">
                            <h6 class="text-white fw-bold mb-2">{{ $project->title }}</h6>
                            <span class="btn btn-sm btn-light">🔗 View</span>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold text-dark mb-1">{{ $project->title }}</h6>
                        <p class="card-text text-muted small">{{ Str::limit($project->summary, 80) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <span class="badge bg-primary">{{ $project->service->name }}</span>
                        @if($project->completed_at)
                            <span class="badge bg-light text-dark">
                                {{ $project->completed_at->format('M Y') }}
                            </span>
                        @endif
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endif

@endsection
