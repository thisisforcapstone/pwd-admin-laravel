<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'announcements';

    // Fillable fields for mass assignment (body removed)
    protected $fillable = [
        'title',
        'location',
        'start_time',
        'end_time',
        'target_audience', // 'presidents', 'members', or 'all'
        'place',
        'posted_on',
    ];

    // Cast start_time and end_time as datetime
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'posted_on' => 'datetime',
    ];

    // Relationship: one announcement has many attendances
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // Relationship: announcement belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
