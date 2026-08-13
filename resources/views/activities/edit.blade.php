@extends('layouts.app')

@section('title', 'Edit Activity')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-pencil-square me-2"></i>Edit Activity</h2>
    <a href="{{ route('activities.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('activities.update', $activity->id) }}">
            @csrf
            @method('PUT')

            {{-- YES: show error message using session --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="idol_name" class="form-label fw-semibold">Idol Name <span class="text-danger">*</span></label>
                    <input type="text" name="idol_name" id="idol_name" class="form-control"
                           value="{{ $activity->idol_name }}" required>
                </div>

                <div class="col-md-6">
                    <label for="activity_name" class="form-label fw-semibold">Activity Name <span class="text-danger">*</span></label>
                    <input type="text" name="activity_name" id="activity_name" class="form-control"
                           value="{{ $activity->activity_name }}" required>
                </div>

                <div class="col-md-4">
                    <label for="category" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">— Select Category —</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ $activity->category === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="activity_date" class="form-label fw-semibold">Activity Date <span class="text-danger">*</span></label>
                    <input type="date" name="activity_date" id="activity_date" class="form-control"
                           value="{{ $activity->activity_date->format('Y-m-d') }}" required>
                </div>

                <div class="col-md-4">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="">— Select Status —</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" {{ $activity->status === $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="duration_hours" class="form-label fw-semibold">Duration (Hours) <span class="text-danger">*</span></label>
                    <input type="number" name="duration_hours" id="duration_hours" class="form-control"
                           min="1" max="5" value="{{ $activity->duration_hours }}" required>
                </div>

                <div class="col-md-6">
                    <label for="viewer_count" class="form-label fw-semibold">Viewer Count <span class="text-danger">*</span></label>
                    <input type="number" name="viewer_count" id="viewer_count" class="form-control"
                           min="500" value="{{ $activity->viewer_count }}" required>
                </div>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-check-lg me-1"></i> Update Activity
                    </button>
                    <a href="{{ route('activities.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
