
@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
       <div class="container">
        <h1>Teams</h1>

        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary mb-3">Add Team</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Instagram</th>
                    <th>Facebook</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->title_job }}</td>
                        <td>
                            @if($team->insta_link)
                                <a href="{{ $team->insta_link }}" target="_blank">Link</a>
                            @endif
                        </td>
                        <td>
                            @if($team->facebook_link)
                                <a href="{{ $team->facebook_link }}" target="_blank">Link</a>
                            @endif
                        </td>
                        <td>
                            @if($team->image)
                                <img src="{{ asset('storage/'.$team->image) }}" width="60" alt="Team Image">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this team?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </div>
@endsection

