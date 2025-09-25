@extends('layouts.admin')

@section('title', 'Access Denied')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center p-5 rounded shadow-lg" style="background:#f8f9fa; max-width:600px;">
        <h1 class="display-3 text-danger fw-bold">403</h1>
        <h2 class="mb-3">🚫 Access Denied</h2>
        <p class="text-muted mb-4">
            Sorry, you don’t have permission to access this page.<br>
            Please contact the administrator if you think this is a mistake.
        </p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
            ⬅ Back to Dashboard
        </a>
    </div>
</div>
@endsection
