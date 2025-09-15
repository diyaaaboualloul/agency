<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Manage Services') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <a href="{{ route('admin.services.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded">+ Add Service</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Description</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td class="border p-2">{{ $service->id }}</td>
                        <td class="border p-2">{{ $service->name }}</td>
                        <td class="border p-2">{{ $service->description }}</td>
                        <td class="border p-2">
                            <a href="{{ route('admin.services.edit', $service->id) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                            <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure?')" 
                                        class="px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
