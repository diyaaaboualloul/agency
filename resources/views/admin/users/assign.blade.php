<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users & Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Current Role</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border p-2">{{ $user->id }}</td>
                                <td class="border p-2">{{ $user->name }}</td>
                                <td class="border p-2">{{ $user->email }}</td>
                                <td class="border p-2">
                                    {{ $user->roles->pluck('name')->implode(', ') ?: 'No role' }}
                                </td>
                                <td class="border p-2">
                                    {{-- Update Role --}}
                                    <form method="POST" action="{{ route('admin.users.assignRole', $user->id) }}" style="display:inline;">
                                        @csrf
                                        <select name="role" class="border rounded p-1">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded">
                                            Update
                                        </button>
                                    </form>

                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 px-3 py-1 onclick="return confirm('Are you sure you want to delete this user?')" 
                                            class="ml-2 px-3 py-1 bg-red-500 text-white rounded">
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
