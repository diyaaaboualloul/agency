<x-app-layout>
    <div class="container">
        <h1>Add Team</h1>

        {{-- عرض رسائل الأخطاء --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="insta_link">Instagram Link</label>
                <input type="text" name="insta_link" id="insta_link" class="form-control">
            </div>

            <div class="mb-3">
                <label for="facebook_link">Facebook Link</label>
                <input type="text" name="facebook_link" id="facebook_link" class="form-control">
            </div>

            <div class="mb-3">
                <label for="title_job">Job Title</label>
                <input type="text" name="title_job" id="title_job" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</x-app-layout>
