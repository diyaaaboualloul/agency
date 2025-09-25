@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay text-center">
        <h2 class="h3 fw-bold text-white mb-3">👋 Welcome, {{ Auth::user()->name }}!</h2>

        {{-- Role Badge --}}
        <p class="text-info fw-semibold mb-4">
            You are logged in as 
            <span class="badge bg-primary">
                {{ Auth::user()->roles->pluck('name')->implode(', ') ?: 'User' }}
            </span>
        </p>

        {{-- Role-Specific Messages --}}
        @if(Auth::user()->hasRole('admin'))
            <div class="alert alert-success shadow-sm fw-semibold">
                ⚡ You are an <strong>Admin</strong>.  
                You have <u>full access</u> to manage everything in the system.
            </div>
        @elseif(Auth::user()->hasRole('editor'))
            <div class="alert alert-info shadow-sm fw-semibold">
                ✏️ You are an <strong>Editor</strong>.  
                You can edit and manage content, but not system settings.
            </div>
        @elseif(Auth::user()->hasRole('viewer'))
            <div class="alert alert-danger shadow-sm fw-semibold">
                👀 You are a <strong>Viewer</strong>.  
                You cannot access the dashboard. Please return to the <a href="{{ route('home') }}" class="text-decoration-underline text-dark">website</a>.
            </div>
        @else
            <div class="alert alert-warning shadow-sm fw-semibold">
                ⚠️ Role not recognized. Please contact the administrator.
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 800px;
        margin: 60px auto;
        padding: 0 20px;
    }
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
    }

</style>
@endpush
