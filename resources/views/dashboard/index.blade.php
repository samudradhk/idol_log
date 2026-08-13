@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-house-door me-2"></i>Dashboard</h2>
    <a href="{{ route('statistics') }}" class="btn btn-outline-primary">
        <i class="bi bi-bar-chart-line me-1"></i> View Statistics
    </a>
</div>

{{-- Welcome Card --}}
<div class="card mb-4 border-0 shadow-sm">
    <div class="card-body">
        <h4 class="card-title mb-1">
            <i class="bi bi-star-fill text-warning me-2"></i>Welcome to IdolLog
        </h4>
        <p class="card-text text-muted">Track and manage your favorite K-Pop &amp; J-Pop idol activities all in one place.</p>
    </div>
</div>

{{-- Summary Cards --}}
<div class="row g-3 mb-4">
    {{-- TODO: Count the total activites --}}
    <div class="col-md-3">
        <div class="card text-white bg-primary border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">{{ $totalActivities }}</div>
                    <div class="small">Total Activities</div>
                </div>
                <i class="bi bi-calendar-event fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    {{-- TODO: Count the upcoming activites --}}
    <div class="col-md-3">
        <div class="card text-white bg-success border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">{{ $upcoming }}</div>
                    <div class="small">Upcoming</div>
                </div>
                <i class="bi bi-clock fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    {{-- TODO: Count the finished activites --}}
    <div class="col-md-3">
        <div class="card text-white bg-secondary border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">{{ $finished }}</div>
                    <div class="small">Finished</div>
                </div>
                <i class="bi bi-check-circle fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    {{-- TODO: Count the total viewers --}}
    <div class="col-md-3">
        <div class="card text-white bg-info border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">{{ $total_view }}</div>
                    <div class="small">Total Viewers</div>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

{{-- Recent Activities Preview --}}
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Recent Activities</h5>
        <a href="{{ route('activities.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Idol</th>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities->take(5) as $activity)
                    <tr>
                        <td class="fw-semibold">{{ $activity->idol_name }}</td>
                        <td>{{ $activity->activity_name }}</td>
                        <td><span class="badge bg-secondary">{{ $activity->category }}</span></td>
                        <td>{{ $activity->activity_date->format('d M Y') }}</td>
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
                        <td colspan="5" class="text-center text-muted py-3">No activities found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
