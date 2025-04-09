<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarbonFootprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'electricity_kwh',
        'fuel_liters',
        'waste_kg',
        'total_emission',
    ];

    // Optional: relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}