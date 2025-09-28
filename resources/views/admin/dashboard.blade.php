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
                        role

        </p>

      
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
