<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'sex', 'birthdate',
        'civil_status', 'disability_type', 'disability_cause', 'residence_address',
        'contact_details', 'educational_attainment', 'employment_status', 'occupation',
        'id_reference_number', 'registration_date', 'email', 'password', 'role',
        'barangay_name', 'is_archived', 'archived_at', 'profile_picture'
    ];

    protected $hidden = ['password'];
}