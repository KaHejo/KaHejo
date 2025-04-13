<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarbonEmission extends Model
{
    use HasFactory;

    protected $table = 'carbon_emissions';

    protected $fillable = [
        'source_type',
        'consumption_amount',
        'unit',
        'emission_factor',
        'total_emission',
        'emission_type',
        'emission_date',
        'location'
    ];

    protected $casts = [
        'consumption_amount' => 'decimal:2',
        'emission_factor' => 'decimal:4',
        'total_emission' => 'decimal:2',
        'emission_date' => 'date'
    ];

    // Relasi ke user jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 