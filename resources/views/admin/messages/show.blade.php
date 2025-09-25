@extends('layouts.admin')

@section('content')
<div class="container my-4">
  <div class="card shadow-lg border-0" style="background-color:#f8f9fa;">
    
    {{-- Header --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">📩 Message #{{ $message->id }}</h4>
      <a href="{{ route('admin.messages.index') }}" class="btn btn-light btn-sm fw-bold">
        ⬅ Back to Messages
      </a>
    </div>

    {{-- Body --}}
    <div class="card-body">

      {{-- Name & Email --}}
      <div class="row mb-4 align-items-stretch">
        <div class="col-md-6 mb-3 mb-md-0">
          <p class="mb-1 fw-bold">Name:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 d-flex align-items-center">
            {{ $message->name }}
          </div>
        </div>
        <div class="col-md-6">
          <p class="mb-1 fw-bold">Email:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 d-flex align-items-center">
            {{ $message->email }}
          </div>
        </div>
      </div>

      {{-- Phone & Status --}}
      <div class="row mb-4 align-items-stretch">
        <div class="col-md-6 mb-3 mb-md-0">
          <p class="mb-1 fw-bold">Phone:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 d-flex align-items-center">
            {{ $message->phone }}
          </div>
        </div>
        <div class="col-md-6">
          <p class="mb-1 fw-bold">Status:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 d-flex align-items-center">
            <span class="badge bg-{{ $message->status == 'read' ? 'success' : 'warning' }} fs-6">
              {{ ucfirst($message->status ?? 'New') }}
            </span>
          </div>
        </div>
      </div>

      {{-- Message --}}
      <div class="mb-4">
        <p class="mb-1 fw-bold">Message:</p>
        <div class="p-4 bg-white rounded shadow-sm" style="min-height:120px;">
          {{ $message->message }}
        </div>
      </div>

      {{-- IP & User Agent --}}
      <div class="row mb-4 align-items-stretch">
        <div class="col-md-6 mb-3 mb-md-0">
          <p class="mb-1 fw-bold">IP:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 d-flex align-items-center">
            {{ $message->ip }}
          </div>
        </div>
        <div class="col-md-6">
          <p class="mb-1 fw-bold">User Agent:</p>
          <div class="p-3 bg-white rounded shadow-sm h-100 small">
            {{ $message->user_agent }}
          </div>
        </div>
      </div>

      {{-- Submitted --}}
      <div class="mb-4">
        <p class="mb-1 fw-bold">Submitted:</p>
        <div class="p-3 bg-white rounded shadow-sm">
          {{ $message->created_at->format('d M Y H:i') }}
        </div>
      </div>

    </div>

    {{-- Footer with Actions --}}
    <div class="card-footer bg-light d-flex flex-wrap justify-content-between gap-2">
      <form method="POST" action="{{ route('admin.messages.markRead', $message->id) }}">
        @csrf
        <button type="submit" class="btn btn-success fw-bold w-100 w-md-auto">
          ✅ Mark as Read
        </button>
      </form>

      <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger fw-bold w-100 w-md-auto"
          onclick="return confirm('Are you sure you want to delete this message?')">
          🗑 Delete
        </button>
      </form>

      <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary fw-bold w-100 w-md-auto">
        ⬅ Back
      </a>
    </div>
  </div>
</div>
@endsection
