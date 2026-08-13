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
        // YES: Implement Form Validation here.
        $validated = $request->validate([
            'idol_name' => ['required', 'min:4'], 
            'activity_name' => ['required'], 
            'category' => ['required'],
            'activity_date' => ['required'], 
            'duration_hours' => ['required'], 
            'viewer_count' => ['required'], 
            'status' => ['required'],
        ]);

        IdolActivity::create($validated);

        // IdolActivity::create($request->only([
        //     'idol_name', 'activity_name', 'category',
        //     'activity_date', 'duration_hours', 'viewer_count', 'status',
        // ]));

        // YES: add session to show success message

        return redirect()->route('activities.index')->with('success','success to insert');
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
        // YES: Implement Form Validation here.
        $validated = $request->validate([
            'idol_name' => ['required', 'min:4'], 
            'activity_name' => ['required'], 
            'category' => ['required'],
            'activity_date' => ['required'], 
            'duration_hours' => ['required'], 
            'viewer_count' => ['required'], 
            'status' => ['required'],
        ]);
        $activity->update($validated);

        // $activity->update($request->only([
        //     'idol_name', 'activity_name', 'category',
        //     'activity_date', 'duration_hours', 'viewer_count', 'status',
        // ]));

        // YES: add session to show success message

        return redirect()->route('activities.index')->with('success','success to update');
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy(IdolActivity $activity)
    {
        $activity->delete();

        // YES: add session to show success message

        return redirect()->route('activities.index')->with('success','success to delete');
    }
}
