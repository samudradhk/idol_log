@extends('layouts.app')

@section('title', 'Statistics')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-bar-chart-line me-2"></i>Statistics</h2>
</div>

{{-- ============================================================ --}}
{{-- YES: Student Exercise                                       --}}
{{-- In StatisticsController@index, retrieve data using:          --}}
{{--   $activities = IdolActivity::all();                         --}}
{{-- Then compute each variable with Collection methods and pass  --}}
{{-- them to this view via compact(...).                          --}}
{{-- ============================================================ --}}

{{-- Section 1: Summary Cards --}}
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">
                        {{-- YES: show total activities --}}
                        <span class="text-white-50">{{ $totalActivities }}</span>
                    </div>
                    <div class="small">Total Activities</div>
                </div>
                <i class="bi bi-calendar-event fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">
                        {{-- YES: show total viewers --}}
                        <span class="text-white-50">{{ $total_view }}</span>
                    </div>
                    <div class="small">Total Viewers</div>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">
                        {{-- YES: Show upcoming event --}}
                        <span class="text-white-50">{{ $upcoming }}</span>
                    </div>
                    <div class="small">Upcoming</div>
                </div>
                <i class="bi bi-clock fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning border-0 shadow-sm">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="fs-2 fw-bold">
                        {{-- YES: show average event duration --}}
                        <span class="text-white-50">{{ round($avg_dur,2) }} hrs</span>
                    </div>
                    <div class="small">Avg. Duration</div>
                </div>
                <i class="bi bi-hourglass-split fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

</div>

{{-- Section 2: Most Viewed Activity --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white fw-semibold">
        <i class="bi bi-trophy me-2 text-warning"></i>Most Viewed Activity
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-1">
                    {{-- YES: show the most viewed activity all the time --}}
                    <span class="text-muted fst-italic">{{ $most->idol_name }} — {{ $most->activity_name }}</span>
                </h5>
                <span class="badge bg-secondary">
                    {{-- YES: show the most viewed category all the time --}}
                    {{ $most->category }}
                </span>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                <div class="fs-4 fw-bold text-info">
                    {{-- YES: show the top viewed all the time --}}
                    <span class="text-muted">{{ $most->viewer_count }}</span>
                </div>
                <div class="small text-muted">viewers</div>
            </div>
        </div>
    </div>
</div>

{{-- Section 3: Activities by Category --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white fw-semibold">
        <i class="bi bi-tag me-2"></i>Activities by Category
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Category</th>
                        <th class="text-center">Total Activities</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- YES: show total of activity based on categories (use groupBy) --}}
                    @foreach (['Concert', 'Variety Show', 'Drama', 'Fan Meeting', 'Live Streaming'] as $cat)
                    <tr class="text-muted fst-italic">
                        <td>{{ $cat }}</td>
                        <td class="text-center">{{ $category->get($cat,collect())->count() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
