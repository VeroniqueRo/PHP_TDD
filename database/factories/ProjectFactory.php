<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'ProjectTitle' => $faker->catchPhrase(),
        'Descriptive' => $faker->sentence(),
    ];
});