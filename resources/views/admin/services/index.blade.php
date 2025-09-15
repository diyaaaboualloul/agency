<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Manage Services') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
       <a href="{{ route('admin.services.create') }}" 
   class="inline-flex items-center gap-2 px-5 py-2.5 
          bg-gradient-to-r from-blue-500 to-blue-600 
          hover:from-blue-600 hover:to-blue-700 
          text-white font-semibold rounded-full shadow-md transition">
    ➕ Add Service
</a>


        @if(session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                        <th class="border p-3">ID</th>
                        <th class="border p-3">Image</th>
                        <th class="border p-3">Name</th>
                        <th class="border p-3">Description</th>
                        <th class="border p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border p-3">{{ $service->id }}</td>
                            <td class="border p-3 text-center">
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->name }}" 
                                         class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">No Image</span>
                                @endif
                            </td>
                            <td class="border p-3 font-semibold">{{ $service->name }}</td>
                            <td class="border p-3 text-gray-700 dark:text-gray-300" style="max-width: 250px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ $service->description }}
                            </td>
                            <td class="border p-3 text-center">
                                <a href="{{ route('admin.services.edit', $service->id) }}" 
                                   class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow">
                                    ✏️ Edit
                                </a>

                                <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this service?')" 
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded shadow">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">
                                No services found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
