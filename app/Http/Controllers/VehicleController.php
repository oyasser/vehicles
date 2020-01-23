<?php

namespace App\Http\Controllers;

use App\Filters\VehicleFilters;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\VehiclesExpenses;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    private $vehicleRepository;

    /**
     * VehicleController constructor.
     * @param VehicleRepositoryInterface $vehicleRepository
     */
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Result could be filtered if request has a filters parameters
     * @param VehicleFilters $filters
     * @return mixed
     */
    public function index(VehicleFilters $filters)
    {
        return $this->vehicleRepository->all($filters);
    }
}
