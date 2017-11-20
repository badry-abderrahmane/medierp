<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Responsable::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'lastName' => $faker->firstNameMale,
      'phone' => $faker->phoneNumber,
      'adresse' => $faker->address,
      'cin' => $faker->bothify($string = '?######'),
      'note' => $faker->lexify($string = '???? ????'),
    ];
});
