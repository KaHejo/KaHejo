<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEnergyConsumption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'source_type',
        'consumption_amount',
        'unit_measurement',
        'activity_type',
        'location_name',
        'consumption_date',
        'reporting_period'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'consumption_amount' => 'float',
        'consumption_date' => 'date',
    ];

    /**
     * Get the company that owns the energy consumption record.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
} 