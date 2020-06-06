<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->sentence(),
        'phone' => $faker->e164PhoneNumber,
        'url' => 'http://testurl.com/',
        'email' => $faker->email,
        'status' => 1,
        'views' => rand(0,40)
    ];
});
