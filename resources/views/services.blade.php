@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
<div class="aximo-breadcrumb">
    <div class="container">
        <h1 class="post__title">Our Services</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li aria-current="page"> Our Services</li>
            </ul>
        </nav>
    </div>
</div>

<div class="section aximo-section-padding3">
    <div class="container">
        <div class="aximo-section-title center">
            <h2>We provide effective
                <span class="aximo-title-animation">design solutions
                    <span class="aximo-title-icon">
                        <img src="{{ asset('assets/images/v1/star2.png') }}" alt="">
                    </span>
                </span>
            </h2>
        </div>

        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="aximo-iconbox-wrap wow fadeInUpX h-100" 
                         style="display: flex; flex-direction: column; justify-content: space-between;">
                         
                        <div class="aximo-iconbox-icon mb-3 text-center">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->name }}" 
                                     style="width:80px; height:80px; object-fit:cover;">
                            @else
                                <i class="icon-design-tools"></i>
                            @endif
                        </div>

                        <div class="aximo-iconbox-data">
                            <h3>{{ $service->name }}</h3>
                            <p style="max-height: 70px; overflow: hidden; text-overflow: ellipsis;">
                                {{ $service->description }}
                            </p>
                        </div>

                        <a class="aximo-icon mt-auto" href="{{ route('services.show', $service->id) }}">
                            <img src="{{ asset('assets/images/icon/arrow-right.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
