@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
     <h2 class="h4 mb-0 fw-bold text-primary">
            🔑 Manage Roles & Permissions
        </h2>
          <div class="container py-5">

        {{-- ✅ Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ➕ Create Role Form --}}
        <div class="card shadow-lg border-0 mb-5">
            <div class="card-header bg-primary text-white fw-semibold">
                Create New Role
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Role Name</label>
                        <input type="text" name="name" placeholder="e.g. Editor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Assign Permissions:</label>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm-{{ $permission->id }}">
                                        <label class="form-check-label" for="perm-{{ $permission->id }}">
                                            {{ ucfirst($permission->name) }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-plus-circle"></i> Create Role
                    </button>
                </form>
            </div>
        </div>

        {{-- 📋 Roles Table --}}
        <div class="card shadow-lg border-0">
            <div class="card-header bg-secondary text-white fw-semibold">
                Existing Roles
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
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
                                            <span class="badge bg-info text-dark me-1">
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
                                        <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Are you sure you want to delete this role?')">
                                            <i class="bi bi-trash"></i> Delete
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
  </div>
@endsection

