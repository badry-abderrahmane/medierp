<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Societe::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'solde' => $faker->numberBetween($min = 100, $max = 90000),
    ];
});
