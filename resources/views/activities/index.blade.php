@extends('layouts.app')

@section('title', 'Idol Activities')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-calendar-event me-2"></i>Idol Activities</h2>
    <a href="{{ route('activities.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add Activity
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Idol Name</th>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Viewers</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $index => $activity)
                    <tr>
                        <td class="text-muted">{{ $activities->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $activity->idol_name }}</td>
                        <td>{{ $activity->activity_name }}</td>
                        <td><span class="badge bg-secondary">{{ $activity->category }}</span></td>
                        <td>{{ $activity->activity_date->format('d M Y') }}</td>
                        <td>{{ $activity->duration_hours }} hr{{ $activity->duration_hours > 1 ? 's' : '' }}</td>
                        <td>{{ number_format($activity->viewer_count) }}</td>
                        <td>
                            @if ($activity->status === 'Upcoming')
                                <span class="badge bg-success">Upcoming</span>
                            @else
                                <span class="badge bg-dark">Finished</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('activities.destroy', $activity->id) }}" class="d-inline"
                                  onsubmit="return confirm('Delete this activity?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">No activities found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($activities->hasPages())
    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
        <small class="text-muted">
            Showing {{ $activities->firstItem() }}–{{ $activities->lastItem() }} of {{ $activities->total() }} activities
        </small>
        {{ $activities->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection
