<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    use HasFactory;

    protected $fillable = ['classification_id', 'location', 'value'];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
}
