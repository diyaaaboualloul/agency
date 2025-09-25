@extends('layouts.admin')

@section('content')
<div class="container my-4">
  <div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">📬 Contact Messages</h4>
    </div>

    <div class="card-body p-0">
      @if(session('success'))
        <div class="alert alert-success m-3">{{ session('success') }}</div>
      @endif

      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Submitted</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($messages as $message)
              <tr class="{{ $message->status !== 'read' ? 'table-warning' : '' }}">
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>
                  <span class="badge bg-{{ $message->status == 'read' ? 'success' : 'warning' }}">
                    {{ ucfirst($message->status ?? 'New') }}
                  </span>
                </td>
                <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                <td class="d-flex gap-2">
                  <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-info btn-sm">👁 View</a>
                  <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">🗑 Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted">No messages found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer">
      {{ $messages->links() }} {{-- pagination --}}
    </div>
  </div>
</div>
@endsection
