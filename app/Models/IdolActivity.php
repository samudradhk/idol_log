<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdolActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'idol_name',
        'activity_name',
        'category',
        'activity_date',
        'duration_hours',
        'viewer_count',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
    ];

    public static array $categories = [
        'Concert',
        'Variety Show',
        'Drama',
        'Fan Meeting',
        'Live Streaming',
    ];

    public static array $statuses = [
        'Upcoming',
        'Finished',
    ];
}
