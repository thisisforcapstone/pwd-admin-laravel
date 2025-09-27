<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'presidents'; // Make sure it's using the correct table
    protected $fillable = ['name', 'email', 'password',]; // Allow mass assignment for these fields

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
