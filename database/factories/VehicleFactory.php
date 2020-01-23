<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'plate_number' => $faker->unique()->randomNumber(7),
        'imei' => Str::random(10),
        'vin' => Str::random(10),
        'year' => $faker->year(),
        'license' => $faker->unique()->randomNumber(7),
    ];
});
