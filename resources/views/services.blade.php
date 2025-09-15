@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
<div class="aximo-breadcrumb">
    <div class="container">
        <h1 class="post__title">Our Services</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li aria-current="page">Our Services</li>
            </ul>
        </nav>
    </div>
</div>

<div class="section aximo-section-padding3">
    <div class="container">
        <div class="aximo-section-title center">
            <h2>
                We provide effective
                <span class="aximo-title-animation">
                    design solutions
                    <span class="aximo-title-icon">
                        <img src="{{ asset('assets/images/v1/star2.png') }}" alt="">
                    </span>
                </span>
            </h2>
        </div>

        <div class="row">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="aximo-iconbox-wrap wow fadeInUpX h-100 d-flex flex-column justify-content-between p-3 shadow-sm rounded"
                         data-wow-delay="0s">

                        {{-- Service Image / Icon --}}
                       <div class="aximo-iconbox-icon mb-3 text-center">
    @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}"
             alt="{{ $service->name }}"
             class="rounded shadow-sm"
             style="width:200px; height:200px; object-fit:cover;">
    @else
        <i class="icon-design-tools" style="font-size:80px;"></i>
    @endif
</div>


                        {{-- Service Info --}}
                        <div class="aximo-iconbox-data text-center">
                            <h3 class="mb-2">{{ $service->name }}</h3>
                            <p class="text-muted"
                               style="max-height: 70px; overflow: hidden; text-overflow: ellipsis;">
                                {{ $service->description }}
                            </p>
                        </div>

                        {{-- Link to details --}}
                        <div class="text-center mt-auto">
                            <a class="aximo-icon d-inline-block mt-3"
                               href="{{ route('services.show', $service->id) }}">
                                <img src="{{ asset('assets/images/icon/arrow-right.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No services available at the moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
