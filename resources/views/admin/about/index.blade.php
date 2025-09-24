
@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
  <div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h4 mb-0">📑 Manage About Page Sections</h2>
         <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-info">
                👀 View About Page
            </a>

    </div>
     <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Section</th>
                            <th>Heading</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td><strong>{{ ucfirst($section->section_key) }}</strong></td>
                                <td>{{ $section->heading ?? '—' }}</td>
                                <td>
                                    @if($section->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.about.edit', $section->id) }}" 
                                       class="btn btn-sm btn-primary">✏️ Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection


