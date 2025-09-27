<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Classification extends Model
{
    use HasFactory;

    // Represents a classification or barangay with a president assigned
    protected $fillable = [
        'name',      // Barangay name or classification name
        'president', // President's name (consider using ID for better linking)
    ];

    /**
     * Members related to this classification/barangay.
     * Matches users whose 'barangay_name' equals this classification's 'name' and role is 'member'.
     */
    public function members()
    {
        return $this->hasMany(User::class, 'barangay_name', 'name')
                    ->where('role', 'member');
    }

    /**
     * Get counts of members grouped by disability type.
     * Returns an associative array with disability_type => count.
     */
    public function getStatsAttribute()
    {
        return $this->members()
            ->selectRaw('disability_type, count(*) as count')
            ->groupBy('disability_type')
            ->pluck('count', 'disability_type')
            ->toArray();
    }
}
