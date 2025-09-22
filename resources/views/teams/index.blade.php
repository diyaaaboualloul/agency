@extends('layouts.app')

@section('title','Teams')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Team Members</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-success">Add Member</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th><th>Name</th><th>Title</th><th>Image</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($teams as $team)
        <tr>
            <td>{{ $team->id }}</td>
            <td>{{ $team->name }}</td>
            <td>{{ $team->title_job }}</td>
            <td>
                @if($team->image)
                    <img src="{{ asset('storage/'.$team->image) }}" alt="" style="width:70px; height:auto;">
                @endif
            </td>
            <td>
                <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-primary">View</a>
                <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No members yet.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $teams->links() }}
@endsection
