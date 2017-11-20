<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Marche::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->name,
      'dateDebut' => $faker->date('Y-m-d', 'now'),
      'delais' => $faker->numberBetween($min = 1, $max = 900),
      'numero' => $faker->unique()->numberBetween($min = 1999, $max = 9999990),
      'montant' => $faker->numberBetween($min = 1000, $max = 9999000),
      'societe_id' => $faker->numberBetween($min = 1, $max = 1000),
    ];
});
