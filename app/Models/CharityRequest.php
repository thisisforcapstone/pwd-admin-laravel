<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharityRequest extends Model
{
    use HasFactory;

    protected $table = 'charity_requests';

    protected $fillable = [
        'member_id',
        'president_id',
        'request_type',
        'category',
        'sub_category',
        'details',
        'description',
        'status',
        'status_detail',
        'endorsed_by_president',
        'rejected_by_president',
        'endorsed_by_admin',
        'rejected_by_admin',
        'remarks',
    ];

    // Relationship to member (User)
    public function member()
    {
        return $this->belongsTo(\App\Models\User::class, 'member_id');
    }

    // Relationship to president (User)
    public function president()
    {
        return $this->belongsTo(\App\Models\User::class, 'president_id');
    }
}
