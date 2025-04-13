<?php

namespace App\Services;

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
} 