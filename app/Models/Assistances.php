<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistances extends Model
{
    use HasFactory;

    protected $table = 'assistances';

    protected $fillable = [
        'type',
        // Benefits
        'benefit_name',
        'program',
        'date_granted',
        'date_expiry',
        'status',
        // Privileges
        'privilege_name',
        'privilege_description',
        'validity_period',
        // Discounts
        'discount_name',
        'discount_rate',
        'date_of_transaction',
        'establishment',
    ];
}