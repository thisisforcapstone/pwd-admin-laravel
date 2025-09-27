<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwdMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'age',
        'disability_type'
    ];

    public function barangay()
    {
        return $this->belongsTo(Classification::class);
    }
}