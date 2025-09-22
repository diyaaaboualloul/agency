@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

{{-- 🔹 Hero Section --}}
@if(isset($sections['hero']) && $sections['hero']->is_active)
<section class="hero d-flex align-items-center text-white"
    style="background-image: url('{{ $sections['hero']->bg_image ? asset('storage/'.$sections['hero']->bg_image) : '' }}'); background-size:cover; background-position:center; min-height:60vh; position:relative;">
    
    {{-- Dark overlay --}}
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6);"></div>

    <div class="container text-center position-relative">
        <h1 class="display-4 fw-bold">{{ $sections['hero']->heading }}</h1>
        <p class="lead">{{ $sections['hero']->description }}</p>

        @if($sections['hero']->button_text && $sections['hero']->button_url)
            <a href="{{ $sections['hero']->button_url }}" class="btn btn-lg btn-primary mt-3">
                {{ $sections['hero']->button_text }}
            </a>
        @endif
    </div>
</section>
@endif

{{-- 🔹 Mission Section --}}
@if(isset($sections['mission']) && $sections['mission']->is_active)
<section class="mission py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                @if($sections['mission']->image)
                    <img src="{{ asset('storage/'.$sections['mission']->image) }}" alt="Our Mission" class="img-fluid rounded shadow">
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $sections['mission']->heading }}</h2>
                <p class="text-muted">{{ $sections['mission']->description }}</p>
            </div>
        </div>
    </div>
</section>
@endif

{{-- 🔹 Vision Section --}}
@if(isset($sections['vision']) && $sections['vision']->is_active)
<section class="vision py-5 bg-light">
    <div class="container">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6 mb-4 mb-md-0">
                @if($sections['vision']->image)
                    <img src="{{ asset('storage/'.$sections['vision']->image) }}" alt="Our Vision" class="img-fluid rounded shadow">
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $sections['vision']->heading }}</h2>
                <p class="text-muted">{{ $sections['vision']->description }}</p>
            </div>
        </div>
    </div>
</section>
@endif

{{-- 🔹 Team Section (Optional if you add later) --}}
@if(isset($sections['team']) && $sections['team']->is_active)
<section class="team py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">{{ $sections['team']->heading ?? 'Meet Our Team' }}</h2>
        <p class="text-muted mb-5">{{ $sections['team']->description }}</p>
        
        {{-- Later we can add dynamic team members from another table --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Team Member">
                    <div class="card-body">
                        <h5 class="fw-bold">John Doe</h5>
                        <p class="text-muted">CEO</p>
                    </div>
                </div>
            </div>
            {{-- Repeat more team members --}}
        </div>
    </div>
</section>
@endif

@endsection
