<?php

use Faker\Generator as Faker;


// NotesFactory.php
$factory->define(App\Log::class, function (Faker $faker) {
    $loggable_type = [
        'incidents',
        'changes'
    ];

    return [
        'loggable_id' => rand(1, 3),
        'loggable_type' => $loggable_type[rand(0,1)],
        'device_id' => rand(1, 3),
        'owner' => $faker->name,
        'description' => $faker->sentence,
        'resolved' => $faker->boolean
    ];
});