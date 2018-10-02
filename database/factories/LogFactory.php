<?php

use Faker\Generator as Faker;


// NotesFactory.php
$factory->define(App\Log::class, function (Faker $faker) {
    /*$loggable = [
        App\Incident::class,
        App\Change::class
    ];

    $loggableType = $faker->randomElement($loggable);
    $loggable = factory($loggableType)->create();*/

    return [
        'loggable_id' => 1,
        'loggable_type' => "incidents",
        'device_id' => factory(App\Device::class)->create()->id,
        'owner' => $faker->name
    ];
});