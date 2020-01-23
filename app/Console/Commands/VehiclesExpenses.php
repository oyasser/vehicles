<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class VehiclesExpenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:vehiclesExpenses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or Replace SQL View.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::statement("
           CREATE OR REPLACE VIEW vehicles_expenses

           AS

           select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,
           `insurance_payments`.`amount` as `cost`, `insurance_payments`.`contract_date` as `createdAt`, 'insurance' as type
           FROM `insurance_payments` INNER JOIN `vehicles` on `insurance_payments`.`vehicle_id` = `vehicles`.`id`

           union select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,`fuel_entries`.`cost` as `cost`, `fuel_entries`.`entry_date` as `createdAt`, 'fuel' as type
           FROM `fuel_entries` INNER JOIN `vehicles` on `fuel_entries`.`vehicle_id` = `vehicles`.`id`

            union select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,`services`.`total` as `cost`, `services`.`created_at` as `createdAt`, 'service' as type
            FROM `services` INNER JOIN `vehicles` on `services`.`vehicle_id` = `vehicles`.`id`
          ");
    }
}
