<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                {{-- Role-based messages --}}
                @role('admin')
                    <div class="mt-4 p-4 bg-red-100 text-red-800 rounded">
                        👑 You are an <strong>Admin</strong>. You can manage everything.
                    </div>

                    {{-- Admin-only button --}}
                    <div class="mt-6">
                        <a href="{{ route('admin.users.index') }}" 
                           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            ⚙️ Manage User Roles
                        </a>
                    </div>
                @endrole

                @role('editor')
                    <div class="mt-4 p-4 bg-blue-100 text-blue-800 rounded">
                        ✍️ You are an <strong>Editor</strong>. You can edit projects, services, and blogs.
                    </div>
                @endrole

                @role('viewer')
                    <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                        👀 You are a <strong>Viewer</strong>. You can only view content.
                    </div>
                @endrole

                {{-- Permission-based tests --}}
                @can('manage all')
                    <div class="mt-4 p-4 bg-purple-100 text-purple-800 rounded">
                        ✅ You have permission to <strong>manage all</strong>.
                    </div>
                @endcan

                @can('edit projects')
                    <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 rounded">
                        🛠️ You have permission to <strong>edit projects</strong>.
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
