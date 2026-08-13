<?php

namespace App\Http\Controllers;

use App\Models\IdolActivity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // TODO: Use Laravel Collection methods to complete the dashboard data.

        $activities = IdolActivity::all();
        $totalActivities = count($activities);
        $upcoming = $activities->where('status','Upcoming')->count();
        $finished = $activities->where('status','Finished')->count();
        $total_view = $activities->sum('viewer_count');

        return view('dashboard.index', compact('activities', 'totalActivities','upcoming','finished','total_view'));
    }
}
