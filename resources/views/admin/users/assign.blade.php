<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">👥 Manage Users & Roles</h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
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
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $user->roles->pluck('name')->implode(', ') ?: 'No role' }}
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
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </form>

                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this user?')" 
                                                class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
