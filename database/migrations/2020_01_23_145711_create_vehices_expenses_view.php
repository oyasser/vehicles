<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVehicesExpensesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "
            CREATE  VIEW vehicles_expenses

            AS

           select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,
           `insurance_payments`.`amount` as `cost`, `insurance_payments`.`contract_date` as `createdAt`, 'insurance' as type
           FROM `insurance_payments` INNER JOIN `vehicles` on `insurance_payments`.`vehicle_id` = `vehicles`.`id`

           union select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,`fuel_entries`.`cost` as `cost`, `fuel_entries`.`entry_date` as `createdAt`, 'fuel' as type
           FROM `fuel_entries` INNER JOIN `vehicles` on `fuel_entries`.`vehicle_id` = `vehicles`.`id`

            union select `vehicles`.`id`, `vehicles`.`name` as `vehicleName`, `vehicles`.`plate_number` as `plateNumber`,`services`.`total` as `cost`, `services`.`created_at` as `createdAt`, 'service' as type
            FROM `services` INNER JOIN `vehicles` on `services`.`vehicle_id` = `vehicles`.`id`
            "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehices_expenses_view');
    }
}
