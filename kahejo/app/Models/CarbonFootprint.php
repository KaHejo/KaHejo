<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarbonFootprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'month',
        'electricity',
        'transportation',
        'waste',
        'water',
        'total'
    ];

    protected $casts = [
        'month' => 'date',
        'electricity' => 'decimal:2',
        'transportation' => 'decimal:2',
        'waste' => 'decimal:2',
        'water' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    // Optional: relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}