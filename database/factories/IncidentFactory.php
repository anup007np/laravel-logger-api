<?php

use Faker\Generator as Faker;

$factory->define(App\Incident::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence
    ];
});
