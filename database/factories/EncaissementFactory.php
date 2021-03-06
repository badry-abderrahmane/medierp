<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Encaissement::class, function (Faker $faker) {
    return [
      'designation' => $faker->name,
      'date' => $faker->date('Y-m-d', 'now'),
      'montant' => $faker->numberBetween($min = 100, $max = 90000),
      'description' => $faker->city,
      'marche_id' => $faker->numberBetween($min = 1, $max = 1000),
    ];
});
