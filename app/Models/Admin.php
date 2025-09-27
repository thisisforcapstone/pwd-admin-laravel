<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // Fixed typo here
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable; // Corrected the typo here

    use HasFactory;

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    protected $table = 'admins'; // Important!
    
    protected $fillable = ['name', 'email', 'password'];
}
