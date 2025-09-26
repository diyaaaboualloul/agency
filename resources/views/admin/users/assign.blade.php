@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <!-- Header Block -->
    <div class="d-flex justify-content-between align-items-center mb-4 table-overlay">
        <h2 class="h3 fw-bold text-white mb-0">👥 Manage Users & Roles</h2>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-success shadow">
            ➕ Manage Roles & Permissions
        </a>
    </div>

    <!-- Users Table -->
    <div class="card-body table-overlay">
        <table class="table table-hover align-middle custom-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Current Role</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="fw-semibold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $roleName = $user->roles->pluck('name')->implode(', ') ?: 'No role';
                            @endphp
                            <span class="role-badge 
                                {{ strtolower($roleName) === 'admin' ? 'bg-danger' : '' }}
                                {{ strtolower($roleName) === 'editor' ? 'bg-primary' : '' }}
                                {{ strtolower($roleName) === 'viewer' ? 'bg-primary' : '' }}
                                ">
                                {{ ucfirst($roleName) }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{-- Update Role --}}
                            <form method="POST" action="{{ route('admin.users.assignRole', $user->id) }}" class="d-inline">
                                @csrf
                                <div class="input-group input-group-sm" style="width: auto; display:inline-flex;">
                                    <select name="role" class="form-select form-select-sm">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ ucfirst($role->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary shadow">
                                        Update
                                    </button>
                                </div>
                            </form>

                            {{-- Delete --}}
                            @php
                                // Count how many admins exist
                                $adminCount = \App\Models\User::role('admin')->count();
                                $isAdmin = $user->hasRole('admin');
                            @endphp

                            @if($isAdmin && $adminCount <= 1)
                                {{-- Protected if this is the last admin --}}
                                <span class="badge bg-secondary">🚫 Cannot Delete</span>
                            @else
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            class="btn btn-sm btn-danger shadow">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Center container */
    .content-centered {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Glassy overlay for blocks */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(6px);
    }

    /* Table header */
    .custom-table thead {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
    }
    .custom-table th {
        color: #fff !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }

    /* Table body */
    .custom-table td {
        color: #f8f9fa !important;
    }

    /* Hover effect */
    .custom-table tbody tr {
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .custom-table tbody tr:hover {
        background: rgba(13, 110, 253, 0.8) !important;
        color: #fff !important;
        transform: scale(1.01);
    }

    /* Role Badges */
    .role-badge {
        display: inline-block;
        font-size: 1rem;       /* larger */
        font-weight: 700;      /* bold */
        padding: 0.4rem 0.8rem;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #fff !important;
    }

    /* Buttons */
    .btn {
        border-radius: 6px;
    }
</style>
@endpush
