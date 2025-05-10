<?php

namespace App\Services;

use App\Models\CompanyEnergyConsumption;
use Illuminate\Support\Facades\Auth;

class CompanyEnergyService
{
    /**
     * Store a newly created company energy consumption in storage.
     *
     * @param array $data
     * @return \App\Models\CompanyEnergyConsumption
     */
    public function store(array $data)
    {
        return CompanyEnergyConsumption::create($data);
    }

    /**
     * Get company energy consumptions by company ID.
     *
     * @param int $companyId
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getByCompanyId(int $companyId)
    {
        return CompanyEnergyConsumption::where('company_id', $companyId)
            ->orderBy('consumption_date', 'desc')
            ->paginate(10);
    }

    /**
     * Find a company energy consumption by ID.
     *
     * @param int $id
     * @return \App\Models\CompanyEnergyConsumption
     */
    public function find(int $id)
    {
        return CompanyEnergyConsumption::findOrFail($id);
    }

    /**
     * Update the specified company energy consumption in storage.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data)
    {
        $consumption = $this->find($id);
        return $consumption->update($data);
    }

    /**
     * Remove the specified company energy consumption from storage.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $consumption = $this->find($id);
        return $consumption->delete();
    }

    /**
     * Get company energy consumptions by period.
     *
     * @param int $companyId
     * @param string $period
     * @param string $date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByPeriod(int $companyId, string $period, string $date)
    {
        $query = CompanyEnergyConsumption::where('company_id', $companyId);
        
        if ($period === 'monthly') {
            $startDate = date('Y-m-01', strtotime($date));
            $endDate = date('Y-m-t', strtotime($date));
            $query->whereBetween('consumption_date', [$startDate, $endDate]);
        } elseif ($period === 'yearly') {
            $startDate = date('Y-01-01', strtotime($date));
            $endDate = date('Y-12-31', strtotime($date));
            $query->whereBetween('consumption_date', [$startDate, $endDate]);
        }
        
        return $query->get();
    }

    /**
     * Get company energy consumptions by source type.
     *
     * @param int $companyId
     * @param string $sourceType
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getBySourceType(int $companyId, string $sourceType)
    {
        return CompanyEnergyConsumption::where('company_id', $companyId)
            ->where('source_type', $sourceType)
            ->get();
    }

    /**
     * Get company energy consumptions by activity type.
     *
     * @param int $companyId
     * @param string $activityType
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByActivityType(int $companyId, string $activityType)
    {
        return CompanyEnergyConsumption::where('company_id', $companyId)
            ->where('activity_type', $activityType)
            ->get();
    }

    /**
     * Get company energy consumptions by department.
     *
     * @param int $companyId
     * @param string $department
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByDepartment(int $companyId, string $department)
    {
        return CompanyEnergyConsumption::where('company_id', $companyId)
            ->where('department', $department)
            ->get();
    }

    /**
     * Get company energy consumptions by location.
     *
     * @param int $companyId
     * @param string $locationName
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByLocation(int $companyId, string $locationName)
    {
        return CompanyEnergyConsumption::where('company_id', $companyId)
            ->where('location_name', $locationName)
            ->get();
    }

    /**
     * Get all company energy consumptions.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllConsumptions()
    {
        return CompanyEnergyConsumption::orderBy('consumption_date', 'desc')
            ->paginate(10);
    }
} 