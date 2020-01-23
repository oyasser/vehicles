<?php

namespace App\Repositories;

use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\VehiclesExpenses;

class VehicleRepository implements VehicleRepositoryInterface
{
    /**
     * Get all vehicle expenses
     * @param $filters
     * @return mixed
     */
    public function all($filters)
    {
        return VehiclesExpenses::filter($filters)->get();

    }
}
