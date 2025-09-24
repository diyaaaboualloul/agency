@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="content-centered">
    <div class="table-overlay mb-5">
        <h2 class="h3 fw-bold text-white mb-4">
            🔑 Manage Roles & Permissions
        </h2>

        {{-- ✅ Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ➕ Create Role Form --}}
        <div class="table-overlay mb-5">
            <h4 class="fw-semibold text-white mb-3">➕ Create New Role</h4>
            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold text-white">Role Name</label>
                    <input type="text" name="name" placeholder="e.g. Editor" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-white">Assign Permissions:</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm-{{ $permission->id }}">
                                    <label class="form-check-label text-white" for="perm-{{ $permission->id }}">
                                        {{ ucfirst($permission->name) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success shadow px-4">
                    💾 Create Role
                </button>
            </form>
        </div>

        {{-- 📋 Roles Table --}}
        <div class="table-overlay">
            <h4 class="fw-semibold text-white mb-3">📋 Existing Roles</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Role</th>
                            <th scope="col">Permissions</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td class="fw-semibold">{{ ucfirst($role->name) }}</td>
                                <td>
                                    @if($role->permissions->isNotEmpty())
                                        @foreach($role->permissions as $perm)
                                            <span class="badge bg-info text-dark me-1 shadow-sm">
                                                {{ ucfirst($perm->name) }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No permissions</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow px-3" onclick="return confirm('Are you sure you want to delete this role?')">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($roles->isEmpty())
                    <p class="text-center text-muted">No roles created yet.</p>
                @endif
            </div>
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

    /* Glassy overlay */
    .table-overlay {
        background: rgba(0, 0, 0, 0.65);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
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
        font-size: 0.85rem;
        letter-spacing: 0.5px;
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

    /* Buttons */
    .btn {
        border-radius: 6px;
    }
</style>
@endpush
