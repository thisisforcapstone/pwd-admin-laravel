<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'filename',
        'file_path',
        'file_type',
        'barangay_name',
        'president_name',  // Store president's name directly, if needed
        'president_id',    // If you store the president's ID in reports table
    ];

    // Define the relationship with the President model
    public function president()
    {
        return $this->belongsTo(President::class); // This assumes 'president_id' exists in the reports table
    }
}
