@extends('layouts.frontend')

@section('title', 'Our Portfolio')

@section('content')
  {{-- Breadcrumb with background image --}}
  <div class="aximo-breadcrumb" 
       style="margin-top: 70px;margin-bottom: 40px; background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">
    <div class="container text-center">
      <h1 class="post__title fw-bold" style="color: #fff;">Portfolio</h1>
      <nav class="breadcrumbs">
        <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
          <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
          <li aria-current="page" class="text-light">/ Portfolio</li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- End breadcrumb -->
<div class="row g-4">
    @forelse($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 portfolio-card">
                <a href="{{ route('singleportfolio', $project->slug) }}" class="text-decoration-none">
                    <img src="{{ $project->cover_url }}" 
                         alt="{{ $project->title }}" 
                         class="card-img-top rounded-top" 
                         style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">{{ $project->title }}</h5>
                        <p class="card-text text-muted small">
                            {{ Str::limit($project->summary, 100) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0">
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
    @empty
        <p class="text-center text-muted">No projects available yet.</p>
    @endforelse
</div>

@endsection
