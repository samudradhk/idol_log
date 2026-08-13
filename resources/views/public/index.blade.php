@extends('layouts.app')

@section('title', 'Idol List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-stars me-2 text-warning"></i>Idol List</h2>
    <small class="text-muted">{{ $idols->count() }} idol{{ $idols->count() !== 1 ? 's' : '' }} found</small>
</div>

@if ($idols->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-1"></i> No idols have been logged yet.
    </div>
@else
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($idols as $idol)
        <div class="col">
            <a href="{{ route('idols.show', $idol->idol_name) }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center py-4">
                        <div class="mb-3">
                            <span class="display-6">
                                <i class="bi bi-person-circle text-secondary"></i>
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-1 text-dark">{{ $idol->idol_name }}</h5>
                        <p class="card-text text-muted small mb-2">
                            <i class="bi bi-calendar-check me-1"></i>
                            {{ $idol->activity_count }} activit{{ $idol->activity_count !== 1 ? 'ies' : 'y' }}
                        </p>
                        @if ($idol->latest_date)
                        <p class="card-text text-muted small">
                            <i class="bi bi-clock-history me-1"></i>
                            Latest: {{ \Carbon\Carbon::parse($idol->latest_date)->format('d M Y') }}
                        </p>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center pb-3">
                        <span class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-eye me-1"></i> View Activities
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endif
@endsection

@section('styles')
<style>
    .hover-card {
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .hover-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15) !important;
    }
</style>
@endsection
