@extends('layouts.admin')

@section('title','Add User')

@section('content')
<div class="content-centered">
    <div class="table-overlay">
        <h2 class="h3 fw-bold text-white mb-4">➕ Add User</h2>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label text-white">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

 <div class="mb-3">
    <label class="form-label text-white">Role</label>
    <select name="role" class="form-select" required>
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
        @endforeach
    </select>
</div>


            <button type="submit" class="btn btn-success">💾 Save</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light">⬅ Cancel</a>
        </form>
    </div>
</div>
@endsection
