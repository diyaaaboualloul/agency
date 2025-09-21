<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="mb-0">{{ __("You're logged in!") }}</p>
            </div>
        </div>

        {{-- Role-based messages --}}
        @role('admin')
            <div class="alert alert-danger mt-4">
                👑 You are an <strong>Admin</strong>. You can manage everything.
            </div>

            {{-- Admin-only buttons --}}
            <div class="mt-4 d-flex gap-3 flex-wrap">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    ⚙️ Manage User Roles
                </a>

                <a href="{{ route('admin.services.index') }}" class="btn btn-success">
                    🛠️ Manage Services
                </a>

                <a href="{{ route('admin.projects.index') }}" class="btn btn-warning">
                    📂 Manage Projects
                </a>

                <a href="{{ route('admin.contact-info.edit') }}" class="btn btn-info text-white">
                    📞 Edit Contact Info
                </a>

                <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark">
                    📰 Manage Blogs
                </a>

                {{-- 🔹 New Buttons --}}
                <a href="{{ route('admin.home.index') }}" class="btn btn-outline-primary">
                    🏠 Edit Home Content
                </a>

                <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary">
                    ℹ️ Edit About Content
                </a>
            </div>
        @endrole

        @role('editor')
            <div class="alert alert-primary mt-4">
                ✍️ You are an <strong>Editor</strong>. You can edit projects, services, and blogs.
            </div>

            {{-- Editor quick links --}}
            <div class="mt-4 d-flex gap-3 flex-wrap">
                <a href="{{ route('admin.services.index') }}" class="btn btn-success">
                    🛠️ Manage Services
                </a>

                <a href="{{ route('admin.projects.index') }}" class="btn btn-warning">
                    📂 Manage Projects
                </a>

                <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark">
                    📰 Manage Blogs
                </a>

                {{-- 🔹 New Buttons (also for editors) --}}
                <a href="{{ route('admin.home.index') }}" class="btn btn-outline-primary">
                    🏠 Edit Home Content
                </a>

                <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary">
                    ℹ️ Edit About Content
                </a>
            </div>
        @endrole

        @role('viewer')
            <div class="alert alert-success mt-4">
                👀 You are a <strong>Viewer</strong>. You can only view content.
            </div>
        @endrole

        {{-- Permission-based tests --}}
        @can('manage all')
            <div class="alert alert-warning mt-4">
                ✅ You have permission to <strong>manage all</strong>.
            </div>
        @endcan

        @can('edit projects')
            <div class="alert alert-secondary mt-4">
                🛠️ You have permission to <strong>edit projects</strong>.
            </div>
        @endcan
    </div>
</x-app-layout>
