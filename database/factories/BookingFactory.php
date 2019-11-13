<?php

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    return [
        "room_id" => factory('App\Room')->create(),
        "user_id"=>factory('App\User')->create(),
        "time_from" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "time_to" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "additional_information" => $faker->name,
    ];
});
