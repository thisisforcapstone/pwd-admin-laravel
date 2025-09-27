<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'announcement_id',
        'admin_id',
        'member_id',
        'barangay_name',
        'status',
        'email',
        'first_name',
        'middle_name',
        'last_name',
    ];

    // Relation sa Admin (who recorded attendance)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id'); // assuming admin is stored in users table
    }

    // Relation sa Announcement
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    // Relation sa User (barangay president)
    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    // Scope for status filtering (optional, for summary)
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
