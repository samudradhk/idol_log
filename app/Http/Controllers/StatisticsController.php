<?php

namespace App\Http\Controllers;

use App\Models\IdolActivity;

class StatisticsController extends Controller
{
    public function index()
    {
        // TODO: Student Exercise
        // Implement Laravel Collection statistics here.
        $activities = IdolActivity::all();
        $totalActivities = count($activities);
        $upcoming = $activities->where('status','Upcoming')->count();
        $total_view = $activities->sum('viewer_count');
        $avg_dur = $activities->avg('duration_hours');
        $most = $activities->sortByDesc('viewer_count')->first();
        $category = $activities->groupBy('category');

        return view('statistics.index',compact('category','most','activities','avg_dur','total_view','totalActivities','upcoming'));
    }
}
