@extends('layouts.app')

@section('title', $idolName . ' — Activities')

@section('content')
<div class="mb-4">
    <a href="{{ route('idols.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
        <i class="bi bi-arrow-left me-1"></i> Back to Idol List
    </a>
    <div class="d-flex align-items-center gap-3">
        <i class="bi bi-person-circle display-5 text-secondary"></i>
        <div>
            <h2 class="mb-0 fw-bold">{{ $idolName }}</h2>
            <small class="text-muted">{{ $activities->count() }} activit{{ $activities->count() !== 1 ? 'ies' : 'y' }} logged</small>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Viewers</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $index => $activity)
                    <tr>
                        <td class="text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $activity->activity_name }}</td>
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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No activities found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
