<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Service;
use App\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'vehicle_id' => function () {
            return factory(Vehicle::class)->create()->id;
        },
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'invoice_number' => Str::random(10),
        'purchase_order_number' =>$faker->unique()->randomNumber(2),
        'status' => "open",
        'discount' => $faker->randomFloat(),
        'tax' => $faker->randomFloat(),
        'total' =>$faker->randomFloat(),
    ];
});
