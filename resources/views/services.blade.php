@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')

{{-- Breadcrumb with background image & overlay --}}
<div class="aximo-breadcrumb position-relative" 
     style="background: url('{{ asset('assets/images/contact/braedcrupm imgg.jpg') }}') center/cover no-repeat; padding: 80px 0; color: #fff;">

    {{-- Dark overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.6);"></div>

    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="post__title fw-bold text-white">Services</h1>
        <nav class="breadcrumbs">
            <ul class="d-inline-flex list-unstyled justify-content-center gap-2">
                <li><a href="{{ url('/') }}" class="text-white fw-semibold">Home</a></li>
                <li aria-current="page" class="text-light">/ Services</li>
            </ul>
        </nav>
    </div>
</div>
<!-- End breadcrumb -->

{{-- 🔹 Services Section --}}
@if($services->isNotEmpty())
<div class="section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Our
                <span class="text-primary position-relative">
                    Services
                    <span class="position-absolute top-0 start-100 translate-middle">
                        <img src="{{ asset('assets/images/v1/star2.png') }}" alt="star" style="width:25px;">
                    </span>
                </span>
            </h2>
        </div>

        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-lg h-100 text-center service-card animate__animated animate__fadeInUp">
                        
                        {{-- Service Image --}}
                        <div class="card-img-top d-flex justify-content-center align-items-center p-4">
                            <div class="img-fixed-wrapper rounded-circle shadow-sm" style="width:200px; height:200px;">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/images/placeholder.png') }}"
                                     alt="{{ $service->name }}"
                                     class="img-fixed rounded-circle"
                                     onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
                            </div>
                        </div>

                        {{-- Service Info --}}
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                            <p class="card-text text-muted"
                               style="max-height: 70px; overflow: hidden; text-overflow: ellipsis;">
                                {{ $service->description }}
                            </p>
                        </div>

                        {{-- Link to details --}}
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('services.show', $service->id) }}"
                               class="btn btn-outline-primary rounded-pill px-4 py-2 hover-btn">
                                Learn More
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection
