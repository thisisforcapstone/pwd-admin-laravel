<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisabilityStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_name',
        'president',
        'visual',
        'hearing',
        'mobility',
    ];
}
