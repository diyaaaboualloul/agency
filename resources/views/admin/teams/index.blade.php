@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold text-white mb-0">👥 Teams</h2>
            <a href="{{ route('admin.teams.create') }}" class="btn btn-primary shadow">+ Add Team</a>
        </div>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- 📋 Teams Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td class="fw-semibold">{{ $team->name }}</td>
                            <td>{{ $team->title_job }}</td>
                            <td>
                                @if($team->insta_link)
                                    <a href="{{ $team->insta_link }}" target="_blank" class="btn btn-sm btn-success shadow">IG</a>
                                @endif
                            </td>
                            <td>
                                @if($team->facebook_link)
                                    <a href="{{ $team->facebook_link }}" target="_blank" class="btn btn-sm btn-success shadow">FB</a>
                                @endif
                            </td>
                            <td>
                                @if($team->image)
                                    <img src="{{ asset('storage/'.$team->image) }}" 
                                         class="rounded shadow-sm" width="60" height="60" style="object-fit:cover;" 
                                         alt="Team Image">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-sm btn-warning shadow">Edit</a>
                                <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this team?')" 
                                            class="btn btn-sm btn-danger shadow">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">No team members found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .content-centered {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    .custom-table thead {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
    }
    .custom-table th {
        color: #fff !important;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .custom-table td {
        color: #f8f9fa !important;
    }

    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(13, 110, 253, 0.8) !important;
        color: #fff !important;
        transform: scale(1.01);
    }

    /* Optional: make green buttons darker on hover */
    .btn-success:hover {
        background-color: #198754 !important;
        border-color: #157347 !important;
    }
</style>
@endpush
