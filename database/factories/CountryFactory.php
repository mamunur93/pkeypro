<?php

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        "shortcode" => $faker->name,
        "title" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
