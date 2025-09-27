<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class President extends Authenticatable
{
    use HasFactory;

    protected $table = 'users   '; // Tama kung ang table name mo ay 'president'

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'role',
        'barangay_name',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false; // Tama kung walang created_at / updated_at columns
}
