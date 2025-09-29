@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
<div class="container">
    <h1>Our Team</h1>
    <div class="row">
        @foreach($teams as $team)
            <div class="col-md-3 text-center">
<img src="{{ $team->image ? asset('storage/'.$team->image) : asset('assets/images/placeholder.png') }}"
     class="img-fluid rounded-circle mb-2"
     onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder.png') }}';">
                <h4>{{ $team->name }}</h4>
                <p>{{ $team->title_job }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
