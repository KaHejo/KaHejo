<?php

namespace App\Services;

use App\Models\CarbonEmission;

class EmissionsService
{
    /**
     * Calculate carbon emissions based on the provided data
     *
     * @param string $sourceType
     * @param float $consumptionAmount
     * @param string $unit
     * @param float $emissionFactor
     * @param string $emissionType
     * @param string $emissionDate
     * @param string $location
     * @return array
     */
    public function calculateEmissions(
        string $sourceType,
        float $consumptionAmount,
        string $unit,
        float $emissionFactor,
        string $emissionType,
        string $emissionDate,
        string $location
    ): array
    {
        // Calculate total emissions
        $totalEmissions = $consumptionAmount * $emissionFactor;
        
        // Return the result with all relevant information
        return [
            'source_type' => $sourceType,
            'consumption_amount' => $consumptionAmount,
            'unit' => $unit,
            'emission_factor' => $emissionFactor,
            'emission_type' => $emissionType,
            'emission_date' => $emissionDate,
            'location' => $location,
            'total_emissions' => $totalEmissions,
            'emissions_unit' => 'CO2e', // Carbon dioxide equivalent
            'calculation_date' => now()->format('Y-m-d'),
        ];
    }

    /**
     * Save emission data to database
     *
     * @param array $data
     * @return CarbonEmission
     */
    public function save(array $data): CarbonEmission
    {
        return CarbonEmission::create([
            'source_type' => $data['source_type'],
            'consumption_amount' => $data['consumption_amount'],
            'unit' => $data['unit'],
            'emission_factor' => $data['emission_factor'],
            'total_emission' => $data['total_emissions'],
            'emission_type' => $data['emission_type'],
            'emission_date' => $data['emission_date'],
            'location' => $data['location'],
        ]);
    }
} 