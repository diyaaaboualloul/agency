@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        {{-- Update Profile --}}
        <div class="mb-5">
            <h3 class="section-title">🙍 Update Profile Information</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Update Password --}}
        <div class="mb-5">
            <h3 class="section-title">🔒 Update Password</h3>
            @include('profile.partials.update-password-form')
        </div>

        {{-- Delete Account --}}
        <div>
            <h3 class="section-title text-danger">⚠️ Delete Account</h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 900px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .table-overlay {
        background: rgba(0, 0, 0, 0.7);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.7);
        backdrop-filter: blur(6px);
        color: #fff;
    }

    /* Force white text */
    .table-overlay h3, 
    .table-overlay h2, 
    .table-overlay p, 
    .table-overlay label, 
    .table-overlay span {
        color: #fff !important;
    }

    /* Inputs */
    .form-control, .form-select, input[type="text"], input[type="email"], input[type="password"], textarea {
        background: rgba(255,255,255,0.1) !important;
        border: 1px solid rgba(255,255,255,0.2) !important;
        color: #fff !important;
    }
    .form-control:focus, .form-select:focus {
        background: rgba(255,255,255,0.2) !important;
        border-color: #0d6efd !important;
        box-shadow: 0 0 8px rgba(13,110,253,0.6);
    }

    /* Buttons */
    .btn, button, [type="submit"] {
        border-radius: 6px;
        font-weight: 500;
        padding: 0.5rem 1.2rem;
        color: #fff !important;
    }
    .btn-primary, [type="submit"].btn {
        background: #0d6efd !important;
        border: none;
    }
    .btn-success {
        background: #198754 !important;
        border: none;
    }
    .btn-danger {
        background: #dc3545 !important;
        border: none;
    }
    .btn:hover, button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.5);
    }
    
</style>
@endpush
