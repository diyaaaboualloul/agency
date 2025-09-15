@extends('layouts.frontend')

@section('title', $service->name)

@section('content')
<div class="aximo-breadcrumb">
    <div class="container">
        <h1 class="post__title">{{ $service->name }}</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li aria-current="page">{{ $service->name }}</li>
            </ul>
        </nav>
    </div>
</div>

<div class="section aximo-section-padding">
    <div class="container">
        <h2>{{ $service->name }}</h2>
        <p>{{ $service->description }}</p>
    </div>
</div>
@endsection
