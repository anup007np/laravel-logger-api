<?php

use Faker\Generator as Faker;

$factory->define(App\Log::class, function (Faker $faker) {
    return [
        /*'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },*/
        'device_id' => factory(App\Device::class)->create()->id,
        'title' => $faker->sentence,
        'resolved' => $faker->boolean,
        'owner' => $faker->name
    ];
});
