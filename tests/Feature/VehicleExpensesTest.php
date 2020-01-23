<?php

namespace Tests\Feature;

use App\FuelEntry;
use App\InsurancePayment;
use App\Service;
use App\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleExpensesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_vehicle_with_expenses()
    {
        $vehicles = factory(Vehicle::class, 2)->create()->each(function ($vehicle) {
//
            //$vehicle->fuel()->save(factory(Service::class, 10)->create());
            factory(FuelEntry::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(Service::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(InsurancePayment::class, 10)->create(['vehicle_id' => $vehicle->id]);

        });


        $vehiclesCount = count($vehicles) == 2;
        $fuelsCount = FuelEntry::count() == 20;
        $servicesCount = Service::count() == 20;
        $insuranceCount = InsurancePayment::count() == 20;

        $this->assertTrue($vehiclesCount);
        $this->assertTrue($fuelsCount);
        $this->assertTrue($servicesCount);
        $this->assertTrue($insuranceCount);
    }

    /** @test */
    public function a_user_can_view_all_vehicle_expenses()
    {
        factory(Vehicle::class, 2)->create()->each(function ($vehicle) {
            factory(FuelEntry::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(Service::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(InsurancePayment::class, 10)->create(['vehicle_id' => $vehicle->id]);

        });

        $this->get('api/vehicles/expenses')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'vehicleName', 'plateNumber', 'cost', 'createdAt', 'type'],
            ]);
    }


    /** @test */
    function a_user_can_search_vehicles_by_any_name()
    {
        $vehicleHasToyota = factory(Vehicle::class, 1)->create(['name' => 'Toyota'])->each(function ($vehicle) {
            factory(FuelEntry::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(Service::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(InsurancePayment::class, 10)->create(['vehicle_id' => $vehicle->id]);

        });

        $vehicleNotHasToyota = factory(Vehicle::class, 1)->create(['name' => 'BMW'])->each(function ($vehicle) {
            factory(FuelEntry::class, 1)->create(['vehicle_id' => $vehicle->id]);
            factory(Service::class, 1)->create(['vehicle_id' => $vehicle->id]);
            factory(InsurancePayment::class, 1)->create(['vehicle_id' => $vehicle->id]);

        });

        $this->get('/api/vehicles/expenses?name=To')
            ->assertSee($vehicleHasToyota->first()->name)
            ->assertDontSee($vehicleNotHasToyota->first()->name);
    }


    /** @test */
    function a_user_can_filter_vehicles_by_type()
    {
        factory(Vehicle::class)->create()->each(function ($vehicle) {
            factory(FuelEntry::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(Service::class, 10)->create(['vehicle_id' => $vehicle->id]);
            factory(InsurancePayment::class, 10)->create(['vehicle_id' => $vehicle->id]);
        });
        $this->get('/api/vehicles/expenses?type[]=fuel')
            ->assertSee("fuel")
            ->assertDontSee("service");

    }


    /** @test */
    function a_user_can_filter_vehicles_by_max_cost()
    {
        factory(Vehicle::class)->create()->each(function ($vehicle) {
            factory(FuelEntry::class)->create(['vehicle_id' => $vehicle->id, 'cost' => 100]);
            factory(Service::class)->create(['vehicle_id' => $vehicle->id, 'total' => 10]);
            factory(InsurancePayment::class)->create(['vehicle_id' => $vehicle->id, 'amount' => 30]);
        });
        $this->get('/api/vehicles/expenses?max_cost=50')
            ->assertSee(10)
            ->assertSee(30)
            ->assertDontSee(100);
    }


    /** @test */
    function a_user_can_filter_vehicles_by_type_and_min_cost()
    {
        factory(Vehicle::class)->create()->each(function ($vehicle) {
            factory(FuelEntry::class)->create(['vehicle_id' => $vehicle->id, 'cost' => 100]);
            factory(Service::class)->create(['vehicle_id' => $vehicle->id, 'total' => 10]);
            factory(Service::class)->create(['vehicle_id' => $vehicle->id, 'total' => 200]);
            factory(InsurancePayment::class)->create(['vehicle_id' => $vehicle->id, 'amount' => 30]);
        });
        $this->get('/api/vehicles/expenses?type[]=fuel&min_cost=50')
            ->assertSee("fuel")
            ->assertDontSee("service")
            ->assertDontSee("insurance");

    }



}
