<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InsurancePayment;
use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(InsurancePayment::class, function (Faker $faker) {
    return [
        'vehicle_id' => function () {
            return factory(Vehicle::class)->create()->id;
        },
        'contract_date' => $faker->date(),
        'expiration_date' => $faker->date(),
        'amount' => $faker->randomFloat(),
    ];
});
