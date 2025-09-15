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

@endsection
