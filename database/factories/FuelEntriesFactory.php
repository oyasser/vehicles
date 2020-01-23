<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FuelEntry;
use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(FuelEntry::class, function (Faker $faker) {
    return [
        'vehicle_id' => function () {
            return factory(Vehicle::class)->create()->id;
        },
        'entry_date' => $faker->date(),
        'volume' => $faker->unique()->randomFloat(),
        'cost' => $faker->randomFloat(),
    ];
});
