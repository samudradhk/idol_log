<?php

namespace App\Http\Controllers;

use App\Models\IdolActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of idol activities.
     */
    public function index()
    {
        $activities = IdolActivity::latest()->paginate(10);

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     */
    public function create()
    {
        $categories = IdolActivity::$categories;
        $statuses   = IdolActivity::$statuses;

        return view('activities.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created activity in storage.
     */
    public function store(Request $request)
    {
        // TODO: Implement Form Validation here.

        IdolActivity::create($request->only([
            'idol_name', 'activity_name', 'category',
            'activity_date', 'duration_hours', 'viewer_count', 'status',
        ]));

        // TODO: add session to show success message

        return redirect()->route('activities.index');
    }

    /**
     * Show the form for editing the specified activity.
     */
    public function edit(IdolActivity $activity)
    {
        $categories = IdolActivity::$categories;
        $statuses   = IdolActivity::$statuses;

        return view('activities.edit', compact('activity', 'categories', 'statuses'));
    }

    /**
     * Update the specified activity in storage.
     */
    public function update(Request $request, IdolActivity $activity)
    {
        // TODO: Implement Form Validation here.

        $activity->update($request->only([
            'idol_name', 'activity_name', 'category',
            'activity_date', 'duration_hours', 'viewer_count', 'status',
        ]));

        // TODO: add session to show success message

        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy(IdolActivity $activity)
    {
        $activity->delete();

        // TODO: add session to show success message

        return redirect()->route('activities.index');
    }
}
