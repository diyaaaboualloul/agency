@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="container">
        <h1>Edit Team</h1>

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

        <form method="POST" action="{{ route('admin.teams.update', $team->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $team->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="insta_link">Instagram Link</label>
                <input type="text" name="insta_link" id="insta_link" class="form-control" value="{{ old('insta_link', $team->insta_link) }}">
            </div>

            <div class="mb-3">
                <label for="facebook_link">Facebook Link</label>
                <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $team->facebook_link) }}">
            </div>

            <div class="mb-3">
                <label for="title_job">Job Title</label>
                <input type="text" name="title_job" id="title_job" class="form-control" value="{{ old('title_job', $team->title_job) }}" required>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">

                @if($team->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$team->image) }}" width="120" alt="Team Image">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    </div>
  </div>
@endsection


